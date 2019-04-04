<?php session_start(); ?>

<?php
  if (isset($_SESSION['u_id'])) {
    echo '<!DOCTYPE html>
          <html>
          <title>QuickEats</title>
            <head>
        ';
    include_once 'head.php';
    echo '</head>
            <body>
            <header>
        ';
    include_once 'header.php';
    echo '</header>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12" id="mainbox">
              <h2 class="text-center"><strong>' . $_SESSION['u_username'] . '</strong></h2>
              <br></br>
              <div class="row">
              <div class="col-md-4 offset-md-4">
              <p>First Name: ' . $_SESSION['u_firstName'] . '</p>
              <p>Last Name: ' . $_SESSION['u_lastName'] . '</p>
              <p>Username: ' . $_SESSION['u_username'] . '</p>
              <p>Email: ' . $_SESSION['u_email'] . '</p>
              <p>Date of Birth: ' . $_SESSION['u_dateOfBirth'] . '</p>
              <p>Gender: ' . $_SESSION['u_gender'] . '</p>
              <p>Points: ' . $_SESSION['u_points'] . '</p>

              <div class="row">
                <div class="col-md-6">
                  <p>Allergies: ' . $_SESSION['u_allergies'] . '</p>
                  <button id="toggleAllergiesInput" class="btn btn-block btn-default" type="submit">Update</button><br></br>
                </div>
                <div class="col-md-6">
                  <form id="allergiesForm" action="includes/allergies-inc.php" method="POST">
                    <input type="text" id="newAllergies" name="newAllergies" /><br></br>
                    <button id="updateAllergies" class="btn btn-block btn-info" type="submit" name="submitAllergies">Submit</button><br></br>
                  </form>
                </div>
              </div>

              </div>
              <br></br>
            </div>
          </div>
	  </div>
          <footer class="text-center">
        ';
    include_once 'footer.php';
    echo '</footer>
          </div>
          </body>
          </html>
        ';
  } else {
    header("Location: signup.php");
    exit();
  }
?>
