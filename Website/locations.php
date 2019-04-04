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
          <h2 class="text-center" id="contact"><strong>Locations</strong></h2>
          <br></br>
          <div class="row">
            <div class="col-md-4 offset-md-4" id="contact-box">
						<p>We have restaurants all over the country: </p>
						<ul>
							<li>Lawrence</li>
							<li>New York City</li>
							<li>Los Angeles</li>
							<li>Las Vegas</li>
						</ul>
            </div>
          </div>
          <br>
        </div>
      </div>

      <footer class="text-center"> <?php include_once 'footer.php'; ?> </footer>

    </div>
  </body>
</html>
