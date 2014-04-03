<!DOCTYPE html>
<html>
	<head>
		<title>Pony Music Spotlight</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/x-icon" href="test" />
        <script language="javascript" type="text/javascript" src="jquery-2.0.3.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<?php //><!--
			$archive_list = array_diff(scandir("archive"), array('.','..'));
			$archive_names = array_map(function($e){
				return pathinfo($e, PATHINFO_FILENAME);
			}, $archive_list);
			if (isset($_GET['id']) and in_array($_GET['id'], $archive_names)) {
				if ($_GET['id'] == "all") {
					$config = array('main' => array('subtitle'=>'All at once!', 'message'=>'Every archived music spotlight combined.'));
					foreach ($archive_list as $file) {
						$music_config = parse_ini_file("archive/".$file, true);
						unset($music_config['main'])
						$config = array_merge($config, $music_config)
					}
				} else {
					$music_file = "archive/".$_GET['id'].".music";
					$config = parse_ini_file($music_file, true);
				}
			} else {
				$music_file = "archive/".max($archive_names).".music";
				$config = parse_ini_file($music_file, true);
			}
			$header_config = $config['main'];
			unset($config['main']);
			// --><?
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
				<a href="#tab1"><div><p>Settings</p></div></a>
				<a href="#tab2"><div class = 'activetab'><p>About</p></div></a>
				<a href="#tab3"><div><p>Archive</p></div></a>
			</div>
			<div id="tab1" class="sidebarpage"> <!--Settings-->
				HELP I DON'T KNOW WHAT TO PUT HERE.
			</div>
			<div id="tab2" class="sidebarpage"> <!--About-->
				<img id="author_avatar" align="right" src="pictures/legomaniack_avatar.png"/>
				<p>
				Hey, you found my about page!
				This site is coded, run, and maintained by Legomaniack.
				Originally just a random e-mail to my friends containing cool music,
				it quickly became more elaborate until becoming the site you see before you.
				My goal is to simply highlight the music I have personally found and feels needs to be shared.
				Think of it as a different version of those 'Top 10' videos that go around.
				</p>
				<p>
				
				</p>
				<p id="about_bottom">
				<a class="underline" target='_blank' href="https://github.com/legomaniack/music_spotlight">Source</a>
				 | 
				<a class="underline" target='_blank' href="mailto:ng31415@gmail.com?subject=Music Spotlight">Contact</a>
				</p>
			</div>
			<div id="tab3" class="sidebarpage"> <!--Archive-->
				<p id="archive_title">Music Spotlight Archive:</p>
				<p class="archive"><a href='/?id=all' class="underline">All</a></p>
				<?php //>PHP is not working!<!--
				
					foreach ($archive_names as $name) {
						echo "<p class='archive'> <a class='underline' href='/?id=".$name."'>Music Spotlight #".$name."</a></p>";
					}
					//--><?
				?> 
			</div>
		</div>
        
		<?php
		//> PHP is not working! <!--  HTML will echo this if PHP is not loading
		foreach ($config as $title => $data) {
			include "content.php";
		}
		// --><? 
		?>
        
	</body>
</html>
