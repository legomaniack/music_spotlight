<span>
	<div id="main">
		<div class="titlebanner">
			<h2 class="title"><?php echo $title; ?></h2>
			<div id="tagbox" class="tags title">
				<?php
					$tags = parse_ini_file('details/tags.details');
					$tag_list = explode(', ',$data['tags']);
					foreach ($tag_list as $tag){
						if (array_key_exists(strtolower($tag), $tags)){
							echo "<a href='#".$tag."'>";
							echo $tags[$tag];
							echo "</a>";
						} else {
							$tag_split = explode(" ", strtolower($tag));
							if (in_array('acoustic', $tag_split) or in_array('electronic', $tag_split)) {
								$tag_name = join(' ', array_slice($tag_split, 1));
							} else {
								$tag_name = $tag;
							}
							$tag_name = str_replace("_", " ", $tag_name);
							echo "<a href='#".strtolower($tag_name)."'>";
							echo "<div class='".strtolower($tag)."'>".$tag_name."</div>";
							echo "</a>";
						}
					}
				?>
			</div>
		</div>
		<div class="container">
			<div class="imgwrapper">
				<img class="artwork" src="<?php echo $data['artwork'];?>">
				<div class="slide">
					<img class="avatar" src="<?php echo $data['avatar']; ?>"></img>
					<?php
						$info = explode("\n", $data['artist']);
						echo "<p class=\"slideinfo\">".trim($info[0])."</p>";
						unset($info[0]);
						foreach ($info as $par) {
							echo "<p class=\"slideinfo secondary\">".trim($par)."</p>";
						}
					?>
				</div>
			</div>
			<div class="content">
				<iframe src="<?php echo $data['iframe'];?>"></iframe>
				<div class="linkbuttons">
					<?php
						$b_details = parse_ini_file('details/buttons.details', true);
						$b_types = explode("\n", $data['buttons']);
						$b_links = explode("\n", $data['links'] );
						$b_backs = explode("\n", $data['backs']);
						for($i = 0; $i < count($b_types); $i++) {
							$b_type = trim(strtolower($b_types[$i]));
							$b_link = trim($b_links[$i]);
							$b_back = trim($b_backs[$i]);
							if(array_key_exists($b_type, $b_details)) {
								$b_icon = $b_details[$b_type]['icon'];
								$b_front = $b_details[$b_type]['front'];
								$b_class = $b_details[$b_type]['class'];
							} else {
								$b_icon = 'OtherIcon.png';
								$b_front = $b_type;
								$b_class = 'Otherbutton';
							}
							include "buttons.php";
						}
					?>
				</div>
			</div>
			<div class="buffer"></div>
		</div>
		<br/>
		<div class="paragraph"><p><?php echo $data['comment']; ?></p></div>
	</div>
</span>
