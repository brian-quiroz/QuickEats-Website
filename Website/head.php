<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="commonScripts.js"></script>

<!--Responsive h1 tag
From https://stackoverflow.com/questions/25403510/bootstrap-3-responsive-h1-tag -->
<script>
$( document ).ready(function() {
  resize();
  $(window).on("resize", resize);
  $(document).ready(resize);
  function resize() {
    let n = $("body").width() / 15 + "pt";
    $("h1").css('fontSize', n);
  }
});
</script>
