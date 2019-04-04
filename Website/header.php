<!--Menu source: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_topnav-->
<div class="topnav" id="myTopnav">
  <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/home.php" class="active" id="logo"><br></a>
  <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/menu.php">Menu</a>
  <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/about.php">About</a>
  <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/locations.php">Locations</a>


<!--Second Menu-->
<?php
  if (isset($_SESSION['u_id'])) {
      echo '
           <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/profile.php">Profile</a>
           <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/snakegame.php">Win Points</a>
           <a href="#" id="logoutButton">
           <form action="includes/logout-inc.php" method="POST">
            <button class="btn btn-block btn-danger" type="submit" name="logout">Logout</button>
           </form>
           </a>
           <a href="#"> &nbsp;Welcome, ' . $_SESSION['u_firstName'];
    } else {
      echo '
          <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/signup.php">Signup</a>
          <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/login.php">Login</a>
      ';
    }
  ?>

  <a href="javascript:void(0);" class="icon" onclick="responsiveNav()">&#9776;</a>
</div>

<?php
  /*if (isset($_SESSION['u_id'])) {
    echo '
      <div class="row" id="welcomeMessage">
      <div class="col-md-12">
      <h2>&nbsp;Welcome, ' . $_SESSION['u_firstName'] . '</h2>
      </div>
      </div>
      ';
  }*/
?>




	       <!--<div class="topnav" id="topNavLoggedIn">
          <a href="#"><p> Welcome, ' . $_SESSION['u_firstName'] . '</p></a>
          <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/profile.php">Profile</a>
          <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/snakegame.php">Snake Game</a>
          <a href="#">
            <form action="includes/logout-inc.php" method="POST">
              <button class="btn btn-block btn-primary" type="submit" name="logout">Logout</button>
            </form>
          </a>
          <a href="javascript:void(0);" class="icon" onclick="responsiveNav()">&#9776;</a>
        </div>
      ';-->

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>-->
