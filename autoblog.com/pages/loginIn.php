
<section id="container">
			<div class="wrap-container">
			
<?php
if(isset($_SERVER['REQUEST_METHOD'])){
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
	if(isset($_POST['login']) && isset($_POST['password'])){
		$login = htmlspecialchars($_POST['login']);
		$password = htmlspecialchars($_POST['password']);
		$password = hash('SHA256', $password);
		if(isUserExists($login,$password))	{
			//session_start();
			$_SESSION['user'] = $login;
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			echo "Добро пожаловать на сайт >";
			echo "<script src='js/reloadPage.js'></script>";
		}else{
			
			echo'Мы Вас не знаем';
		}
	}
}
}
?>			
			
<form action="/loginIn" method="post" class = "RegistrationForm">
	
	<h3>Вход в учетную запись пользователя</h3>
	<label>Логин
		<input type="text" name = "login" />		
	</label>
	<br>
		<label>Пароль
		<input type="password" name = "password"/>		
	</label>	
	<br>

	<input type="submit" value="Войти"/>
	
</form>
</div>
</section>