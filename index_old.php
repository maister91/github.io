<?php
	include 'feedreader.php';
	$feedReader = new FeedReader();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grandimarkt </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="libs/style.css">
  <link rel="stylesheet" href="libs/theme.css">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper  page-content">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
		<a class="weatherwidget-io" href="https://forecast7.com/nl/51d055d22/beringen/" data-label_1="BERINGEN" data-label_2="WEER by S91" data-font="Roboto" data-icons="Climacons Animated" data-theme="marine" >BERINGEN WEER</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
	  <div class="container">
		<!--Carousel Wrapper-->
		<div id="carousel-thumb" class="carousel slide carousel-fade" data-ride="carousel">
		  <!--Slides-->
		  <div class="carousel-inner" role="listbox"><?php
				  foreach (scandir('images') as $index=>$file) {
					  if (!in_array($file, ['.', '..'])) {
							?><div class="carousel-item fix-slider <?=($index==2?'active':'')?>">
							  <img class="img-responsive" src="images/<?=$file?>">
							</div><?
					  }
				  }
		  ?></div>
		  <!--/.Slides-->
		</div>
		<!--/.Carousel Wrapper-->

	  </div>
    </div>

  </div>
  <!-- /#wrapper -->
<footer class="footer">
      <div class="container">
        <span class="text-muted">test</span>
      </div>
    </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
<script>
 $(document).ready(function(){
    setInterval(function(){ reload_page(); },60*60000);
 });

 function reload_page()
 {
    window.location.reload(true);
 }
</script>
</body>

</html>
