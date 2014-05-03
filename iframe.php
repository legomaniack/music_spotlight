
<?php
	$URL = $_GET['id'];

	echo $URL;
	
    $domain = file_get_contents($URL);

	
	
    echo $domain;
?>

<script>
$('#player').css('max-width', '100%');
$('#nonartarea').css('height', '100%');
$('#artarea').css('height', '100%');
$('.info').css('height', '100%');
$('#maintext').css('float','left');
$('#big_play_button').css('bottom','80');
</script>
				