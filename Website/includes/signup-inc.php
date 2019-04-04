<?php
session_start();
  /**
  * Sgns user up if username provided does not exist; if there are any errors, redirects the user back to the signup page with an error message
  *
  * @param  None
  * @return None
  * @throws None
  *
  */
  //function signupUser() {
    if (isset($_POST['submit'])) {
      //Including this php file, which logs into the database
      include_once 'mysqli-inc.php';

      //Obtaining the user's information from the HTML form:
      $firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
      $lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
      $email = mysqli_real_escape_string($mysqli, $_POST['email']);

      $username = mysqli_real_escape_string($mysqli, $_POST['username']);
      $password = mysqli_real_escape_string($mysqli, $_POST['password']);

      $year = mysqli_real_escape_string($mysqli, $_POST['year']);
      $month = mysqli_real_escape_string($mysqli, $_POST['month']);
      $day = mysqli_real_escape_string($mysqli, $_POST['day']);
      $dateOfBirth = $year . '-' . $month . '-' . $day;

      $genderString = mysqli_real_escape_string($mysqli, $_POST['gender']);
      $gender = substr(ucfirst($genderString), 0);

      //Setting allergies to "none" and "points" to 0 by default (these can be modified once the user is logged in)
      $allergies = "none";
      $points = 0;

      //Searching for the username provided by the user in the database to see if it already is linked to another account
      $usernameMatched = "SELECT * FROM Users WHERE user_username = '$username'";
      $result = mysqli_query($mysqli, $usernameMatched);
      $resultCheck = mysqli_num_rows($result);

      //If the username already exists in the database, redirect the user to the signup page
      if ($resultCheck > 0) {
        header("Location: ../signup.php?signup=usertaken");
        exit();
      } else {

        /*If the user does not already exist in the database, we can create the new user
        (all other input checking has been handled on the client-side by the Javascript file formChecker.js)*/
        $insertData = "INSERT INTO Users(`user_firstName`, `user_lastName`, `user_email`, `user_username`, `user_password`, `user_dateOfBirth`, `user_gender`, `user_allergies`, `user_points`) VALUES('$firstName', '$lastName', '$email', '$username', '$password', '$dateOfBirth', '$gender', '$allergies', '$points')";
        mysqli_query($mysqli, $insertData);

        //Automatically logging in the user:

        //Finding the user by username
        $userIDMatched = "SELECT * FROM Users WHERE user_username = '$username'";
        $result2 = mysqli_query($mysqli, $userIDMatched);
        /*Fetching the database's row with the user's information into an associative array so we can save each piece
        of information into a variable*/
        if ($row = mysqli_fetch_assoc($result2)) {

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
          
          //Redericting the user to profile.php with the message login=success
          header("Location: ../profile.php?login=success");
          exit();
        }
        exit();
      }

    } else {

      /*If someone attempts to access this php without clicking on the "Sign Up" button  on the Signup page (provided the signup information is validated by formChecker.js) , they'll be redirected to the signup page.*/
      header("Location: ../signup.php");
      exit();
    }
  //}

  //session_start();
  //signupUser();

?>
