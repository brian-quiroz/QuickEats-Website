<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<title>QuickEats</title>
	<head>
		<?php include_once 'head.php'; ?>
    <script type="text/javascript" src="formChecker.js"></script>
	</head>

	<body onload="return initialState();">
		<header> <?php include_once 'header.php'; ?> </header>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" id="mainbox">
          <h2 class="text-center" id="contact"><strong>Sign Up</strong></h2>
          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form onsubmit="return validateForm();" id="signup-form" action="includes/signup-inc.php" method="POST">
                <p>First Name:</p>
                <input type="text" class="form-control" id="firstName" name="firstName">
                <div class="error" id="firstName-error"></div>
                <br>

                <p>Last Name:</p>
                <input type="text" class="form-control" id="lastName" name="lastName">
                <div class="error" id="lastName-error"></div>
                <br>

                <p>Email:</p>
                <input type="text" class="form-control" id="email" name="email">
                <div class="error" id="email-error"></div>
                <br>

                <p>Date of Birth:</p>
                <div class="row">
                  <div class="col-md-4">
                    <select class="form-control" id="month" name="month">
                    </select>
                  </div>

                  <div class="col-md-4">
                    <select class="form-control" id="day" name="day">
                    </select>
                  </div>

                  <div class="col-md-4">
                    <select class="form-control" id="year" name="year">
                    </select>
                  </div>
                </div>
                <div class="error" id="dateOfBirth-error"></div>
                <br>

                <p>Gender:</p>
                <div class="row">
                  <div class="col-md-4">
                    <div class="radio form-control">
                      <label><input type="radio" name="gender" value="male">&nbsp;&nbsp;Male</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="radio form-control">
                      <label><input type="radio" name="gender" value="female">&nbsp;&nbsp;Female</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="radio form-control">
                      <label><input type="radio" name="gender" value="other">&nbsp;&nbsp;Other</label>
                    </div>
                  </div>
                </div>
								<div class="error" id="gender-error"></div>
                <br>

                <p>Username:</p>
                <input type="text" class="form-control" id="username" name="username">
                <div class="error" id="username-RTerror"></div>
                <div class="error" id="username-error"></div>
                <br>

                <p>Password:</p>
                <input type="password" class="form-control" id="password" name="password">
                <div class="error" id="password-RTerror"></div>
                <div class="error" id="password-error"></div>
                <br>

                <p>Re-Enter Password:</p>
                <input type="password" class="form-control" id="reEnteredPassword" name="reEnteredPassword">
                <div class="error" id="reEnteredPassword-RTerror"></div>
                <div class="error" id="reEnteredPassword-error"></div>
                <br>

                <div class="row">
                  <div class="col-md-3">
										<button class="btn btn-block btn-info" onclick="submitValidation()" id="submitButton" type="submit" name="submit">Sign up</button>
                  </div>
             </form>
             <form onsubmit="resetForm()">
                  <div class="col-md-3">
										<button class="btn btn-block btn-warning" type="submit" id="resetButton" name="reset">Reset</button>
                  </div>
                </div>
            </form>

            <div class="error" id="error-message"></div>
            </div>
          </div>
          <br>
        </div>
      </div>

			<footer class="text-center"> <?php include_once 'footer.php'; ?> </footer>

    </div>
  </body>
</html>
