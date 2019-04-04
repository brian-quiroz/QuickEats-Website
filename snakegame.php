<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<title>QuickEats</title>
	<head>
		<?php include_once 'head.php'; ?>
    <script type="text/javascript" src="Game/snake.js"></script>
	</head>

	<body>
		<header> <?php include_once 'header.php'; ?> </header>

  <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" id="mainbox">
          <h2 class="text-center" id="contact"><strong>Snake</strong></h2>

          <div class="row">
            <div class="col-md-6 offset-md-3" id="contact-box">

		<div class="row">
		<div class="col-md-5">
              	<p class="text-center" style="float:left">
              		Rules:
              		W/A/S/D/Arrows control direction <br>
              		Speed 1~4 Each Point:10<br>
              		Speed 5~6 Each Point:30<br>
              		Speed >=7  Each Point:80<br>
              		Dead: Hit Wall OR Hit Myself
              	</p>
		</div>
		<div class="col-md-7">
              	<canvas id="snake" width="" height=""></canvas>
              	<form id="gameForm" action="includes/snakegame-inc.php" method="POST">
              	<h4 id="score">Score: 0</h4>
								<h4 id="speed">Speed: 1</h4>
								<div class="row">
									<div class="col-md-4">
										<button class="btn btn-block btn-info" id="submitGame" type="submit" name="submitGame">Submit Score</button>
									</div>
              </form>
								<div class="col-md-4">
									<button class="btn btn-block btn-warning" onclick="reset()" id="resetGame" type="submit" name="resetGame">Reset</button>
								</div>
							</div>

	      </div>
	      </div>
              <script>
              startGame();
              </script>


            </div>
          </div>
          <br>
        </div>
      </div>

      <footer class="text-center"> <?php include_once 'footer.php'; ?> </footer>

    </div>
  </body>
</html>
