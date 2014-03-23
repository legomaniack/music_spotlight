<!DOCTYPE html>
<html>
	<head>
		<title>Music Spotlight Compilation</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>		
		<link rel="shortcut icon" type="image/x-icon" href="test" />
        <script language="javascript" type="text/javascript" src="jquery-2.0.3.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<?php
			$archive_list = array_diff(scandir("archive"), array('.','..'));
			$archive_names = array_map(function($e){
				return pathinfo($e, PATHINFO_FILENAME);
			}, $archive_list);
			if (isset($_GET['id']) and in_array($_GET['id'], $archive_names)) {
				$music_file = "archive/".$_GET['id'].".music";
			} else {
				$music_file = "archive/".max($archive_names).".music";
			}
			$config = parse_ini_file($music_file, true);
			$header_config = $config['main'];
			unset($config['main']);
		?>
		<div class="header">
			<em><h4>Music Spotlight</h4></em>
			<img class="shade" src="pictures/BannerGradient.png"/>
			<img class="icon" src="pictures/BannerIcon.png"/>
			<h1><?php echo $header_config['subtitle'];?></h1>
		</div>
		<br/>
		<div class="message"><p class="message"> <?php echo $header_config['message'];?></p></div>
		<br/>
		<div class="break"></div>
        <a><div class="sidebutton">
			<img src="pictures/menu.png"/>
		</div></a>
		<div class="sidebar">
			<div id="navMenu">
				<a href="#tab1"><div>Settings</div></a>
				<a href="#tab2"><div>About</div></a>
				<a href="#tab3"><div>Archive</div></a>
			</div>
			<div id="tab1" class="sidebarpage">
				TEST1
			</div>
			<div id="tab2" class="sidebarpage">
				Blah
			</div>
			<div id="tab3" class="sidebarpage">
				Cake
			</div>
		</div>
        
		<?php
		foreach ($config as $title => $data) {
			include "content.php";
		}
		?>
        
	</body>
</html>
