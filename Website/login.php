<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<title>QuickEats</title>
	<head>
		<?php include_once 'head.php'; ?>
	</head>

	<body>
		<header> <?php include_once 'header.php'; ?> </header>

  <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" id="mainbox">
          <h2 class="text-center" id="contact"><strong>Login</strong></h2>
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form action="includes/login-inc.php" method="POST">
                <p>User ID (username or email):</p>
                <input type="text" class="form-control" id="userIDLogin" name="userIDLogin">
                <br></br>

                <p>Password:</p>
                <input type="password" class="form-control" id="passwordLogin" name="passwordLogin">
                <div class="error" id="passwordLogin-error"></div>
                <br></br>
                <div class="text-center">
                  <button class="btn btn-block btn-primary" type="submit" name="login">Login</button>
                </div>
              </form>
              <br></br><br></br>
            </div>
          </div>
        </div>
      </div>

      <footer class="text-center"> <?php include_once 'footer.php'; ?> </footer>

    </div>
  </body>
</html>
