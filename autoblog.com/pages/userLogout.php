
<section id="container">
			<div class="wrap-container">
				<?php
					session_destroy();
					unset($_SESSION['user']);
					unset($_SESSION['ip']);
					echo "Пока чувак";
						echo "<script src='js/reloadPage.js'></script>";
				?>
			</div>
</section>