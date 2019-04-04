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
          <h2 class="text-center" id="contact"><strong>FAQ</strong></h2>
          <br></br>
          <div class="row">
            <div class="col-md-4 offset-md-4" id="contact-box">
							<div id="questions">
							<p>Q: Is this a legit business?</p>
							<p>A: Seems a bit sketchy, doesn't it?</p><br></br>
							<p>Q: Do you do delivery?</p>
							<p>A: Unfortunately, not yet.</p><br></br>
							<p>Q: How much wood would a woodchuck chuck if a woodchuck could chuck wood?</p>
							<p>A: New York state wildlife expert Richard Thomas found that a woodchuck could (and does) chuck around 35 cubic feet of dirt in the course of digging a burrow. Thomas reasoned that if a woodchuck could chuck wood, he would chuck an amount equivalent to the weight of the dirt, or 700 pounds.</p>
						  </div>
							<br></br>
            </div>
          </div>
          <br>
        </div>
      </div>

      <footer class="text-center"> <?php include_once 'footer.php'; ?> </footer>

    </div>
  </body>
</html>
