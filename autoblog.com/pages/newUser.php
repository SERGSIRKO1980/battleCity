<?php
if (isset($_SERVER['REQUEST_URI'])){
	if (isset ($_SERVER['REQUEST_METHOD'])){
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$login = htmlspecialchars($_POST['login']);
			$password = htmlspecialchars($_POST['password']);
			$confPassword = htmlspecialchars($_POST['confPassword']);
			$email = htmlspecialchars($_POST['email']);
			$password = hash('sha256', $password );
			
				if (userExist($login)){
					echo "<p>Логин уже занят. <a href = '/'>Вернуться</a></p>";
				}else{
					if (createNewUser($login, $password, $email)){
						echo "(Регистрация прошла успешно) <a href='/'>Поехали<a>";
						echo '<a href="/userpage" class="myButton">Перейти в профиль</a>';
					}else{
						echo "Error";						
					}
				}
		}
	}
}
?>
<section id="container">
			<div class="wrap-container">
<form action="/newUser" method="post" class = "RegistrationForm">
	<h3>Регистрация нового пользователя</h3>
	<label>Логин
		<input type="text" name = "login" />		
	</label>
	<br>
		<label>Пароль
		<input type="text" name = "password"/>		
	</label>	
	<br>
	<label>Подтвердите пароль
		<input type="text" name = "confPassword"/>		
	</label>	
	<br>
	<label>e-mail
		<input type="text" name = "email"/>		
	</label>
	<br>
	<input type="submit" value="Зарегистрировать"/>
	
</form>
</<div>
</section>