<?php
  /**
  * Logs the user out and redirects them back to the homepage
  *
  * @param  None
  * @return None
  * @throws None
  *
  */
  function logoutUser() {
    //If the user clicked on the "logout" button, log him out
    if (isset($_POST['logout'])) {
      session_start();
      session_unset();
      session_destroy();
      header("Location: ../home.php");
      exit();
    }

  }

  logoutUser();
?>
