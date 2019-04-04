<?php
  /**
  * Updates the allergies whenever the user updates their allergies on their profile (update re-writes allergies)
  *
  * @param  None
  * @return None
  * @throws None
  *
  */
  function updateAllergies() {
    if (isset($_SESSION['u_id'])) {
      if (isset($_POST['submitAllergies'])) {
	//Including this php file, which logs into the database  
        include_once 'mysqli-inc.php';
       
        //Obtaining the new allergies string from the input box and obtaining the user's id number and username because we'll need them
        $newAllergies = mysqli_real_escape_string($mysqli, $_POST['newAllergies']);
        $currentUserIDNumber = $_SESSION['u_id'];
        $currentUserID = $_SESSION['u_username'];
	
	//If the allergies field is  empty, the user is redirected to the login page with the message error=empty
      	if (empty($newAllergies)) {
          header("Location: ../profile.php?error=empty");
          exit();
        } else {

	  //Using the user's username to find them and updating "user_allergies"
          $sql = "UPDATE Users SET `user_allergies` = '$newAllergies' WHERE `user_id` = '$currentUserIDNumber'";
          mysqli_query($mysqli, $sql);

          //Updating the session variable for allergies so that the user's allergies are updated in real time in their profile
          $userIDMatched = "SELECT * FROM Users WHERE user_username = '$currentUserID'";
          $result = mysqli_query($mysqli, $userIDMatched);
          if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['u_allergies'] = $row['user_allergies'];
          }

          //Redirect users back to their profile with the message submit=success
          header("Location: ../profile.php?submit=success");
          exit();
        }
      } else {
	//If the user has accessed this page without clicking on "Update" and then on "Submit" on their profile page, redirect them back to profile page
        header("Location: ../profile.php");
        exit();
      }

    } else {
      //If the user has accessed this page without signing up, redirect them to the signup page
      header("Location: ../signup.php");
      exit();
    }
  }

  session_start();
  updateAllergies();

?>
