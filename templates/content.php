<span>
	<div>
		<div class="titlebanner">
			<h2 class="title"><?php echo $title; ?></h2>
			<div id="tagbox" class="tags title">
				<?php
					//TAG CODE HERE - GOOD LUCK
				?>
			</div>
		</div>
		<div class="container">
			<div class="imgwrapper">
				<img class="artwork" src="<?php echo $data['artwork'];?>">
				<div class="slide">
					<img class="avatar" src="<?php echo $data['avatar']; ?>"></img>
					<p class="slideinfo">{artist}</p>
				</div>
			</div>
			<div class="content">
				<iframe src="{iframe}"></iframe>
				<div class="linkbuttons">
					<?php
						$b_types = explode($data['buttons'], "/n");
						$b_links = explode($data['links'], "/n");
						$b_backs = explode($data['backs'], "/n");
						foreach ($b_types as $b_type) {
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
