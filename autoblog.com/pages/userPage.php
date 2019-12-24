

<section id="container">
	<div class="wrap-container">
		<?php
			if(isset($_SESSION['user'])){
				echo "Привет ".$_SESSION['user'];
				echo "<img class='smallogo' src='"; 
					echo getUserLogo($_SESSION['user']);
				echo "' alt=''>";
				start('pages'.SEPARATOR.'userLogoUploader'.FILE_EXTENSION);
			}
		?>
	</div>
</section>
