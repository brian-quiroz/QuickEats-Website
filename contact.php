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
          <h2 class="text-center" id="contact"><strong>Contact</strong></h2>
          <br></br>
          <div class="row">
            <div class="col-md-4 offset-md-4" id="contact-box">
              <p>Feel free to contact us with any inquiries you have!</p>

              <p>Name:</p>
              <input type="text" class="form-control" required><br></br>

              <p>Email:</p>
              <input type="email" class="form-control" required><br></br>

              <p>Message:</p>
                <textarea class="form-control" rows="5" ></textarea><br></br>

              <a href="#" target="_blank"><button class="btn btn-primary" id="send">Send</button></a>
            </div>
          </div>
          <br>
        </div>
      </div>

      <footer class="text-center"> <?php include_once 'footer.php'; ?> </footer>

    </div>
  </body>
</html>
