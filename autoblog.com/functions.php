<?php

function start ($source) {
    if (isset($source)) {
        if (file_exists(PROJECT_ROOT.SEPARATOR.$source)) {
            require_once(PROJECT_ROOT.SEPARATOR.$source);
        }
    } else {
        require_once(PROJECT_ROOT.SEPARATOR.'error_not_found'.FILE_EXTENSION);
    }
}

function draw_navigation_panel () {
    $panel = [
        'main'  => '/home',
        'blog' => '/blog',
        'Gallery' => '/gallery',
        'About us' => '/about',
        'Contacts' => '/contacts'
    ];
    echo '<div id="cssmenu" class="align-right">';
        echo '<ul>';
            foreach ($panel as $key => $value) {
                if ($value === '/contacts') {
                    echo '<li class="last">';
                } else {
                    echo '<li class="has_sub">';
                }
                    echo "<a href=\"$value\">";
                        echo "<span>$key</span>";
                    echo '</a>';
                echo '</li>';
            }
        echo '</ul>';
    echo '</div>';
}

function get_page_content () { 
    $path = $_SERVER['REQUEST_URI'];

    switch ($path) {
        case '/':

        case '/home':
            start('pages'.SEPARATOR.'home'.FILE_EXTENSION);
            break;
        case '/gallery':
            start('pages'.SEPARATOR.'gallery'.FILE_EXTENSION);
            break;
        case '/contacts':
            start('pages'.SEPARATOR.'contacts'.FILE_EXTENSION);
            break;
        case '/blog':
            start('pages'.SEPARATOR.'blog'.FILE_EXTENSION);
            break;
        case '/newUser':
            start('pages'.SEPARATOR.'newUser'.FILE_EXTENSION);
            break;
        case '/about':
            start('pages'.SEPARATOR.'about'.FILE_EXTENSION);
            break;
        case '/loginIn':
            start('pages'.SEPARATOR.'loginIn'.FILE_EXTENSION);
            break;
        case '/userLogout':
            start('pages'.SEPARATOR.'userLogout'.FILE_EXTENSION);
            break;
        case '/userPage':
            start('pages'.SEPARATOR.'userPage'.FILE_EXTENSION);
            break;    
        default:
            $parameters = explode('?', $path);
            if (count((array)$parameters) === 2) {
                 $parameters = explode('/', $parameters[0]);
                 start('pages'.SEPARATOR.$parameters[1].FILE_EXTENSION);
             } elseif (count($parameters) === 5) {
                 start('pages'.SEPARATOR.'form'.FILE_EXTENSION);
             } 
             else {
                 start('pages'.SEPARATOR.'error_not_found'.FILE_EXTENSION);
            }
            break;
    }
}

function get_all_categories() {

    $connection = MySQLConnector::openConnection();
    $query = 'SELECT category_title, img_src, img_alt, category_href FROM categories';
    $result = mysqli_query($connection, $query);
    $c = 0;

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
                if ($c === 0 || $c === 4)
                    echo '<div class="row">';
                        echo '<div class="col-1-4">';
                            echo '<div class="wrapper">';
                                echo '<a href="'.$row['category_href'].'">';
                                    echo '<div class="portfolio-box">';
                                        echo '<img src="'.$row['img_src'].'" class="img-responsive" alt="'.$row['img_alt'].'" />';
                                        echo '<div class="portfolio-box-caption">';
                                            echo '<div class="portfolio-box-caption-content">';
                                                echo '<div class="project-category text-faded">';
                                                    echo $row['category_title'];
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                        echo '</div>';
                if ($c === 3 || $c === 7)
                    echo '</div>';
            $c++;
        }
    }

    MySQLConnector::closeConnection();
}

function get_category(string $username) {
    switch ($username) {
        case 'car':
            $query = "SELECT * FROM car WHERE car.id_category = (
                      SELECT id_category FROM categories WHERE categories.category_href = '/category?category=car'
                      )";
            break;
        case 'sportcar':
            $query = "SELECT * FROM car WHERE car.id_category = ( SELECT id_category FROM categories WHERE categories.category_href = '/category?category=sportcar')";
            break;
        case 'bus':
            $query = "SELECT * FROM car WHERE car.id_category = (
                      SELECT id_category FROM categories WHERE categories.category_href = '/category?category=bus'
                      )";
            break;
        case 'truck':
            $query = "SELECT * FROM car WHERE car.id_category = (
                      SELECT id_category FROM categories WHERE categories.category_href = '/category?category=truck'
                      )";
            break;
        case 'bicycle':
            $query = "SELECT * FROM car WHERE car.id_category = (
                      SELECT id_category FROM categories WHERE categories.category_href = '/category?category=bicycle'
                      )";
            break;
        case 'motorcycle':
            $query = "SELECT * FROM car WHERE car.id_category = (
                      SELECT id_category FROM categories WHERE categories.category_href = '/category?category=motorcycle'
                      )";
        case 'quadricycle':
            $query = "SELECT * FROM car WHERE car.id_category = (
                      SELECT id_category FROM categories WHERE categories.category_href = '/category?category=quadricycle'
                      )";
            break;
        case 'hydrocycle':
            $query = "SELECT * FROM car WHERE car.id_category = (
                      SELECT id_category FROM categories WHERE categories.category_href = '/category?category=hydrocycle'
                      )";
            break;
        default:
            break;
    }

    $connection = MySQLConnector::openConnection();
    $result = mysqli_query($connection, $query);
    $cols = 4;
    

    if ($result->num_rows > 0) {
        $row = null;
        for ($i = 0; $i < $cols; $i++) {
            $row = mysqli_fetch_assoc($result);
            echo '<div class="col-1-4">';
                echo '<div class="wrap-col post">';
                    echo'<div class="item-container">';
                        echo '<div class="item-caption">';
                            echo '<div class="item-caption-inner">';
                                echo '<div class="item-caption-inner1">';
                                    echo '<a class="example-image-link" href="'.$row['img_src'].'" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">';
                                        echo '<i class="fa fa-search"></i>';
                                    echo '</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                        echo '<img src="'.$row['img_src'].'" alt="'.$row['img_alt'].'" />';
                        echo '<h3>'.$row['model'].'</h3>';
                        echo '<p>'.$row['info'].'</p>';
                        echo '<p><strong>'.$row['price'].'</strong></p>';
                    echo '</div>';
                    echo '<a class="button" href="'.$row['details_href'].'">Learn More</a>';
                    echo '<a class="button" href="'.$row['leasing_href'].'">Lease transport</a>';
                echo '</div>';
            echo '</div>';
        }
    }

     MySQLConnector::closeConnection();
}

function send_form_data($option = STORE_IN_DATABASE) {
    $log = fopen(PROJECT_ROOT.SEPARATOR.'contact.log', 'w');

	$text = '<span style="color:red; font-size: 35px; line-height: 40px; magin: 10px;">Error! Please try again.</span>';

	if (isset($_POST['submit'])) {
		$username = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];

        $to = 'staspetro110@gmail.com';
        $subject = $_POST['subject'];
		$from = 'autoblog.com';
		$headers = "From: $from\r\n";
		$headers .= 'Content-type: text/plain; charset=UTF-8' . "\r\n"; 
			
		$date = date('r');
		if (mail($to, $subject, $message, $headers)) {
			fwrite($log, "[$date] Message sent successfully\r\n", 64);

			$text = '<span style="color:blue; font-size: 35px; line-height: 40px; margin: 10px;">Your Message was sent successfully!</span>';
		}

        if ($option === STORE_IN_DATABASE) {
            $connection = MySQLConnector::openConnection();
            if ($connection) {
                fwrite($log, "[$date] Connection opened successfully\r\n");

                $query =  "INSERT INTO form_data(username, email, mail_subject, mail_message) VALUES ('$username', '$email', '$subject', '$message')";

                if (mysqli_query($connection, $query)) {
                    fwrite($log, "[$date] Query processed successfully\r\n");
                }

                MySQLConnector::closeConnection();
            }
        }
    }

    fclose($log);
}

function get_details($modelHref){
	echo "<div class='details'>";
		//echo "Выбранная вами модель для просмотра: ".$modelHref;
		//echo("<br>");
		$href = explode("?", $modelHref);
		$modelHref = "?".$href[1];
		//echo $modelHref;
	$conn = MySQLConnector::openConnection();
	$query = "SELECT car.model, state_car.state_car, fuels.fuel_type, details_car.apetite, details_car.description FROM car, details_car, fuels, state_car WHERE details_car.id_car = (SELECT car.id_car FROM car WHERE car.details_href = '".$modelHref."') AND details_car.id_fuel = fuels.id AND details_car.id_state = state_car.id AND details_car.id_car = car.id_car";
	$result = mysqli_query($conn, $query);
	if($result->num_rows>0){
	$row = mysqli_fetch_array($result);
		echo "<pre>";
		echo "<h1>";
		echo $row['model'];
		echo "</h1>";
		echo "</pre>";
	}
	MySQLConnector::closeConnection();
	
	echo "</div>";
	
	
	
	
	
}
function userExist($login){
		$conn = MySQLConnector::openConnection();
		$query = "SELECT users.id_user FROM users WHERE users.login = '$login'";
		$result = mysqli_query($conn, $query);
		if($result->num_rows > 0){
				MySQLConnector::closeConnection();
			return TRUE;
		}else{
				MySQLConnector::closeConnection();
			return FALSE;
		}
	}
function createNewUser($login, $password, $email){
	$conn = MySQLConnector::openConnection();
		$query = "INSERT INTO users (users.login, users.password, users.email ) VALUES(
	'$login', '$password', '$email')";
	$result = mysqli_query($conn, $query);
	$add = mysqli_affected_rows($conn);
	if($add == 1) {
		MySQLConnector::closeConnection();
		return TRUE;
	}else{
		MySQLConnector::closeConnection();
		return FALSE;
	}
}
function isUserExists($login,$password){
	$query = "SELECT id_user FROM users WHERE login='$login' AND password='$password'";
	$conn = MySQLConnector::openConnection();
	$result = mysqli_query($conn, $query);
	if($result->num_rows > 0){
		return TRUE;
	}else{
		echo "Мы вас не знаем";
		return FALSE;
	}
}

function getUserLogo($user){
	return "/images/userLogo/default.png";
}