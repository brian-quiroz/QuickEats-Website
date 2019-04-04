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
          <h2 class="text-center" id="contact"><strong>About</strong></h2>
          <br></br>
          <div class="row">
            <div class="col-md-4 offset-md-4" id="contact-box">
							<p>We could write a boring old about page... but we think our food speaks for itself. Checkout the <a href="https://people.eecs.ku.edu/~r229q057/team3_project4/Website/menu.php">menu</a> and see for yourself!</p>
            </div>
          </div>
          <br>
        </div>
      </div>

      <footer class="text-center"> <?php include_once 'footer.php'; ?> </footer>

    </div>
  </body>
</html>
