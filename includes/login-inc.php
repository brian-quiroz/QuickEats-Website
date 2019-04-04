
<?php
  /**
  * Logs the user into the website and redirects the user back to the login page when an error is encountered
  *
  * @param  None
  * @return None
  * @throws None
  *
  */
  function loginUser() {
    if (isset($_POST['login'])) {
      //Including this php file, which logs into the database
      include 'mysqli-inc.php';

      //Obtaining user's ID and password. Users ID can be the user's username or their email
      //$userID = $_POST['userIDLogin'];     
      $userID = mysqli_real_escape_string($mysqli, $_POST['userIDLogin']);
      //$password = $_POST['passwordLogin'];
      $password = mysqli_real_escape_string($mysqli, $_POST['passwordLogin']);

      //If the username or password fields are empty, the user is redirected to the login page with the message login=empty
      if (empty($userID) || empty($password)) {
        header("Location: ../login.php?login=empty");
        exit();
      } else {
        //Finding the user by username or email
        $userIDMatched = "SELECT * FROM Users WHERE user_username = '$userID' OR user_email = '$userID'";
        $result = mysqli_query($mysqli, $userIDMatched);
        $resultCheck = mysqli_num_rows($result);

        /*If neither the username nor email is  registered in the database, the user is redirected
        to the login page with the message login=error*/
        if ($resultCheck < 1) {
          header("Location: ../login.php?login=error");
          exit();
        } else {
          /*Fetching the database's row with the user's information into an associative array so we can save each piece
          of information into a variable*/
          if ($row = mysqli_fetch_assoc($result)) {
            if ($password != $row['user_password']) {
              header("Location: ../login.php?login=error");
              exit();
            } else if ($password == $row['user_password']) {

              //Logging in the user:

              /*We store each part of the user's information into a session variable so that we can use them everywhere
              else in the code.*/
              $_SESSION['u_id'] = $row['user_id'];
              $_SESSION['u_firstName'] = $row['user_firstName'];
              $_SESSION['u_lastName'] = $row['user_lastName'];
              $_SESSION['u_email'] = $row['user_email'];
              $_SESSION['u_username'] = $row['user_username'];
              $_SESSION['u_dateOfBirth'] = $row['user_dateOfBirth'];
  	      $_SESSION['u_gender'] = $row['user_gender'];
  	      $_SESSION['u_allergies'] = $row['user_allergies'];
  	      $_SESSION['u_points'] = $row['user_points'];

              //Redericting the user to home.php with the message login=success
              header("Location: ../home.php?login=success");
              exit();
            }
          }
        }
      }
    
    } else {

      /*If someone attempts to access this php without clicking on the "Login" button  on the Login page , they'll be redirected to home.php with the
      message login=error.*/
      header("Location: ../home.php?login=error");
      exit();
    }
  }

  //session_start();
  loginUser();

 ?>
