	<div class="userControls ">

		<?php
			if(isset($_SESSION['user'])){
				echo "Вы <a href='/userPage'>".$_SESSION['user']."</a>";
				echo "<img  class='smallogo2' src='"; 
					echo getUserLogo($_SESSION['user']);
				echo "' alt=''>";
				echo '<a href="/userPage" class="myButton">Перейти в профиль</a>';
				echo "<a href='/userLogout' class='myButton'>Выйти</a>";
			}else{
						echo '<a href="/newUser" class="myButton">Регистрация</a>';	
						echo '<a href="/loginIn" class="myButton">Вход</a>';
				
			}
		
		?>
			
	</div>
	
<?php
	draw_navigation_panel();
?>