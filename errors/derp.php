<html>
  <head>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>	
  </head>
  <body>
	<?php
		if (isset($_SERVER['REDIRECT_STATUS'])) {
			$status = $_SERVER['REDIRECT_STATUS'];
		} else {
			$status = "404";
		}
		$dir = "./derpy";
		$files = array_diff( scandir($dir), array(".", "..") );
		$derpnum = count($files);
		$rand = rand(1, $derpnum);
	?>
	<div id="floater">
	<div class="content">
		<h1 class="text">I just don't know what went wrong</h1>
		<img class="derpy" src="./derpy/derpy<?php echo $rand;?>.png"/>
		<h2 class="text">Error <?php echo $status;?></h2>
	</div></div>
  </body>
</html>
