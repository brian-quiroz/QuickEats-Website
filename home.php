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
	  <div id="home">
	  <div class="row" id="top-banner">
	    <div class="col-md-12">
				<h1 class="text-center"><span class="highlighter">Like fast food, but healthier.</span></h1>
	    </div>
	  </div>
	  <br><br>
	  <div class="row">
	    <div class="col-md-3 offset-md-2">
	      <h3>Healthy. <br><br>Fast. <br><br>Delicious. </h3>
	    </div>
	    <div class="col-md-5">
	      <h5>“<em>I've never been a Burger King person. I'm a total QuickEats person.”</em><br></h5>
	      <h5 class="text-right">- John Doe</h5>
	      <br></br>
	      <h5>“<em>I never thought ordering food could be such a fullfilling and life-changing experience. 10/10 would recommend.”</em><br></h5>
	      <h5 class="text-right">- Mary Sue</h5>
	    </div>
	  </div>
	  </div>

	  <div class="row">
	    <div class="col-md-12" id="mainbox">

	      <h2 class="text-center" id="menu"><strong>Menu</strong></h2>
							<br></br>
							<div class="row">
								<div class="col-md-4">
									<img class="item center-block img-fluid" src="https://s-media-cache-ak0.pinimg.com/originals/ed/b9/91/edb9919ea31525bba037fac25e3a63e5.jpg" alt="Food">
								</div>
								<div class="col-md-4">
									<img class="item center-block img-fluid" src="https://www.simplyrecipes.com/wp-content/uploads/2005/09/moms-baked-apple-slices-horiz-a-1500.jpg" alt="Food">
								</div>
								<div class="col-md-4">
									<img class="item center-block img-fluid" src="https://www.filepicker.io/api/file/3j3rEWE4Rsu1AkFfTUQC" alt="Food">
								</div>
							</div>
							<br></br>
	            <div class="row">
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="http://1.bp.blogspot.com/-KbSHjpg-ToE/T_d8wctYrEI/AAAAAAAAE0g/q8QGP2m_x3A/s1600/005.JPG" alt="Food">
	              </div>
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="https://cdn.foodism.co.uk/featured_image/5a5f356052f71.jpeg" alt="Food">
	              </div>
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="https://ardo.com/files/attachments/.10587/w1440h700q85_UWP.jpg" alt="Food">
	              </div>
	            </div>
	            <br></br>
	            <div class="row">
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="http://2.bp.blogspot.com/-TenXumcZy5w/Uc8IDDr2kPI/AAAAAAAAAOs/r4pq83YBVVg/s1000/health+food+recipes.jpg" alt="Food">
	              </div>
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="https://cdn3.tmbi.com/secure/RMS/attachments/37/1200x1200/Roasted-Carrot-Fries_exps144224_TH2236622PG08_26_5c_RMS.jpg" alt="Food">
	              </div>
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="https://greatist.com/sites/default/files/LowCal_NewFeat.jpg" alt="Food">
	              </div>
	            </div>
	            <br></br>
	            <div class="row">
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="https://i0.wp.com/www.onegreenplanet.org/wp-content/uploads//2015/03/oats3.jpg?resize=1200%2C800" alt="Food">
	              </div>
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="https://dingo.care2.com/pictures/greenliving/uploads/2014/07/483198969.jpg" alt="Food">
	              </div>
	              <div class="col-md-4">
	                <img class="item center-block img-fluid" src="https://images.media-allrecipes.com/images/68210.jpg" alt="Food">
	              </div>
	            </div>

							<br></br>
	            <br></br>

	      <h2 class="text-center" id="contact"><strong>Contact</strong></h2>
	      <div class="row">
	        <div class="col-md-4 offset-md-4" id="contact-box">
	          <p>Feel free to contact us with any inquiries you have!</p>
						<p>Name:</p>
						<input type="text" class="form-control" required><br></br>

						<p>Email:</p>
						<input type="email" class="form-control" required><br></br>

						<p>Message:</p>
							<textarea class="form-control" rows="5" id="comment"></textarea><br></br>

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
