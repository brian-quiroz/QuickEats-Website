<?php
  /**
  * Obtains the user's score in the snake game and updates his number of points in the database
  *
  * @param  None
  * @return None
  * @throws None
  *
  */
  function updatePoints() {
    if (isset($_SESSION['u_id'])) {
      if (isset($_POST['submitGame'])) {
	//Including this php file, which logs into the database
        include_once 'mysqli-inc.php';

	//Obtaining the user's score and the user's id number and username because we'll need them
        $score = $_POST['score'];
        $currentUserIDNumber = $_SESSION['u_id'];
        $currentUserID = $_SESSION['u_username'];
       
	//Using the user's username to find them and updating "user_points"
	 $sql = "UPDATE Users SET `user_points` = `user_points` + '$score' WHERE `user_id` = '$currentUserIDNumber'";
        mysqli_query($mysqli, $sql);

        //Updating the session variable for points so that the user's points are updated in real time in their profile
        $userIDMatched = "SELECT * FROM Users WHERE user_username = '$currentUserID'";
        $result = mysqli_query($mysqli, $userIDMatched);
        if ($row = mysqli_fetch_assoc($result)) {
          $_SESSION['u_points'] = $row['user_points'];
        }
	
	//Redirect users back to Snake game page with the message submit=success
        header("Location: ../snakegame.php?submit=success");
        exit();
      } else {
	//If the user has accessed this page without clicking on "Submit" on the Snake Game page, redirect them back to the Snake Game page
        header("Location: ../snakegame.php");
        exit();
      }

    } else {
      //If the user has accessed this page without signing up, redirect them to the signup page
      header("Location: signup.php");
      exit();
    }
  }

  session_start();
  updatePoints();

?>
