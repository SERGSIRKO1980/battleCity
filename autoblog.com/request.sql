-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.16 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных autoblog
CREATE DATABASE IF NOT EXISTS `autoblog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `autoblog`;

-- Дамп структуры для таблица autoblog.car
CREATE TABLE IF NOT EXISTS `car` (
  `id_car` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` int(10) unsigned NOT NULL,
  `model` varchar(32) NOT NULL,
  `img_src` varchar(64) NOT NULL,
  `img_alt` varchar(16) DEFAULT '',
  `info` varchar(1024) DEFAULT NULL,
  `price` varchar(16) DEFAULT NULL,
  `details_href` varchar(128) NOT NULL,
  `leasing_href` varchar(128) NOT NULL,
  PRIMARY KEY (`id_car`),
  UNIQUE KEY `id_car` (`id_car`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `car_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы autoblog.car: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` (`id_car`, `id_category`, `model`, `img_src`, `img_alt`, `info`, `price`, `details_href`, `leasing_href`) VALUES
	(1, 1, 'BMW X7 2018', '../images/bmw.jpg', 'bmw.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore\r\n	magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', '$100000', '?details=bmwx7', '?lease=bmwx7'),
	(2, 1, 'Audi A8 2018', '../images/audi.jpg', 'audi.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore\r\n	magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', '$2000000', '?details=audia8', '?lease=audia8'),
	(3, 1, 'Toyota Camry 2018', '../images/toyota.jpg', 'toyota.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore\r\n	magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', '$150000', '?details=toyotacamry', 'lease=toyotacamry'),
	(4, 1, 'Honda City 2018', '../images/honda.jpg', 'honda.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore\r\n	magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', '$120000', '?details=hondacity', '?lease=hondacity'),
	(5, 2, 'Citroen GT Sport 2018', '../images/citroen.jpg', 'citroen.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore\r\n	magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', '$400000', '?details=citroengt', '?lease=citroengt'),
	(6, 2, 'McLaren 540C Coupe 2018', '../images/mclaren.jpg', 'mclaren.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore\r\n	magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', '$2200000', '?details=mclaren540c', '?lease=mclaren540c'),
	(7, 2, 'Porsche Cayman GT4', '../images/porsche.jpg', 'porsche.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore\r\n	magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', '$180000', '?details=porschecayman', '?lease=porschecayman'),
	(8, 2, 'Lotus Elise 2018', '../images/lotus.jpg', 'lotus.jpg', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore\r\n	magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.', '$170000', '?details=lotuselise', '?lease=lotuselise');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;

-- Дамп структуры для таблица autoblog.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_href` varchar(64) NOT NULL,
  `category_title` varchar(32) NOT NULL,
  `img_src` varchar(64) NOT NULL,
  `img_alt` varchar(32) DEFAULT 'image',
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `id_category` (`id_category`),
  UNIQUE KEY `category_title` (`category_title`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы autoblog.categories: ~8 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id_category`, `category_href`, `category_title`, `img_src`, `img_alt`) VALUES
	(1, '/category?category=car', 'Легковые автомобили', '/images/car.jpg', 'car.jpg'),
	(2, '/category?category=sportcar', 'Спорткары', 'images/sportcar.jpg', 'sportcar.jpg'),
	(3, '/category?category=truck', 'Грузовики', 'images/truck.jpg', 'truck.jpg'),
	(4, '/category?category=bus', 'Автобусы', 'images/bus.jpg', 'bus.jpg'),
	(5, '/category?category=bicycle', 'Велосипеды', 'images/bicycle.jpg', 'bicycle.jpg'),
	(6, '/category?category=motorcycle', 'Мотоциклы', 'images/motorcycle.jpg', 'motorcycle.jpg'),
	(7, '/category?category=quadricycle', 'Квадроциклы', 'images/quadricycle.jpg', 'quadricycle.jpg'),
	(8, '/category?category=hydrocycle', 'Гидроциклы', 'images/hydrocycle.jpg', 'hydrocycle.jpg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица autoblog.details_car
CREATE TABLE IF NOT EXISTS `details_car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_car` int(10) unsigned NOT NULL,
  `id_state` int(10) unsigned NOT NULL,
  `id_fuel` int(10) unsigned NOT NULL,
  `apetite` float NOT NULL,
  `description` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_car` (`id_car`),
  KEY `id_fuel` (`id_fuel`),
  KEY `id_state` (`id_state`),
  CONSTRAINT `details_car_ibfk_1` FOREIGN KEY (`id_car`) REFERENCES `car` (`id_car`),
  CONSTRAINT `details_car_ibfk_2` FOREIGN KEY (`id_fuel`) REFERENCES `fuels` (`id`),
  CONSTRAINT `details_car_ibfk_3` FOREIGN KEY (`id_state`) REFERENCES `state_car` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы autoblog.details_car: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `details_car` DISABLE KEYS */;
INSERT INTO `details_car` (`id`, `id_car`, `id_state`, `id_fuel`, `apetite`, `description`) VALUES
	(1, 3, 1, 2, 8.5, 'Toyota Camry по праву заслуживает звание одного из самых популярных автомобилей в более чем 100 странах мира. Первое поколение Toyota Camry появилось в 1982 году, и с тех пор количество проданных в мире Camry исчисляется десятками миллионов.\r\nНовое поколение Toyota Camry - это не просто усовершенствованная версия любимого седана. Модель 8-й генерации разработана «с нуля», для чего было спроектировано тысячи новых деталей. Автомобиль построен на инновационной унифицированной платформе Toyota New Global Architecture (TNGA), что позволило снизить центр тяжести и значительно увеличить жесткость кузова. Благодаря платформе TNGA, а также новым стойкам амортизаторов и полностью новой задней подвеске Toyota Camry отличается непревзойденной управляемостью рядом с легендарной плавностью хода.'),
	(2, 1, 1, 2, 9.5, 'Данная версия кроссовера будет конкурировать с Mercedes GL Classe, Infiniti QX80, Lincoln Navigator и Cadillac Escalade, которые популярны в Соединенных Штатах. BMW X7 G07 будет доступен с некоторыми новыми функциями, иметь современный и элегантный дизайн, 7 посадочных мест (включая 2 дополнительных сидения) и большое пространство в багажном отделении Что касается двигателей, то учитывая размеры автомобиля и его массу, несмотря на использование углепластика и других легких материалов, она будет где-то 2,2-2,3 тонны, — для этого потребуется большая мощность и крутящий момент. Версией начального уровня, вероятней всего будет xDrive40i с 3-литровый турбированным бензиновым двигателем мощностью 320 л.с. и 450 Нм крутящего момента. Для американского рынка, может быть доступна xDrive50i с двигателем V8 объемом 4,4 литра, который выдает 450 л.с. и 650 Нм крутящего момента. Дизельные версии будут по-прежнему лучшим выбором из-за топливной эффективности и дополнительного крутящего момента. Моделью начального уровня может быть xDrive40d с 313-сильным мотором и крутящим моментом в 630 Нм и M50d с три-турбированным 3-литровым дизелем мощностью 381 л.с. и 740 Нм крутящего момента, и если это будет так, то предположительно M50d не будет продаваться под маркой «M». Что касается трансмиссии, скорее всего, что X7 будет оснащен 8-ступенчатой коробкой передач.'),
	(3, 2, 2, 3, 7.5, 'А8 – первая в мире машина, выпускаемая большими сериями, с несущим кузовом из алюминиевого сплава. По мнению специалистов фирмы такая конструкция позволила значительно уменьшить массу машины. Audi А8 – автомобиль представительского класса с богатым оснащением. Модель выпускают только с кузовом седан.'),
	(5, 4, 2, 3, 9.5, 'Базовая версия Honda City 2018 года оснащена силовым агрегатом SOHC i-VTEC, объем которого составляет 1,5 л, а мощность – 117 «лошадок».\r\n\r\nА в паре с данным двигателем работает бесступенчатая коробка передач CVT, сочетающая в себе простоту, функциональность и практичность.'),
	(6, 5, 1, 2, 8.5, 'GTbyCITROEN - это интерпретация автомобиля класса гран-туризмо, который является результатом совместной деятельности компании Citroёn и фирмы Polyphony Digital Inc., создательницы игры-симулятора Gran Turismo 5 для игровой приставки Playstation.\r\n\r\nМодель GTbyCITROEN, в которой реальный мир переплетается с виртуальным, родилась в рамках новаторского партнерства – сначала в игре, а потом и в реальной жизни.\r\n\r\nКонцепт - кар GTbyCITROEN, получивший премию Louis Vuitton Classic Concept Award, как лучший концепт–кар года, отличается динамичным, рельефным и отточенным кузовным дизайном. Мощь и сила модели GTbyCITROEN передается его внушительными габаритами, а также широкими колесными арками.\r\n\r\nЯркий внешний облик GTbyCITROEN дополняют открывающиеся вверх двери в форме «крыла чайки» – совершенно неожиданный дизайнерский ход применительно к автомобилям этого класса.\r\n\r\nСалон рассчитан на двух человек. Выполненный в темных тонах интерьер особенно впечатляет на фоне светлого лакокрасочного покрытия кузова. Обитый черной кожей с элементами отделки из стали и меди, салон GTbyCITROEN выглядит очень спортивно.');
/*!40000 ALTER TABLE `details_car` ENABLE KEYS */;

-- Дамп структуры для таблица autoblog.form_data
CREATE TABLE IF NOT EXISTS `form_data` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `mail_subject` varchar(32) NOT NULL,
  `mail_message` varchar(1024) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы autoblog.form_data: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `form_data` DISABLE KEYS */;
INSERT INTO `form_data` (`id_user`, `username`, `email`, `mail_subject`, `mail_message`) VALUES
	(1, 'Max', 'max@mar.com.ru', 'Великий недоброжелатель', 'Ваши авто ghtrhfcy');
/*!40000 ALTER TABLE `form_data` ENABLE KEYS */;

-- Дамп структуры для таблица autoblog.fuels
CREATE TABLE IF NOT EXISTS `fuels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fuel_type` varchar(16) NOT NULL DEFAULT '',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы autoblog.fuels: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `fuels` DISABLE KEYS */;
INSERT INTO `fuels` (`id`, `fuel_type`) VALUES
	(1, 'Метан'),
	(2, 'Бензин'),
	(3, 'Газ/Бензин'),
	(4, 'Соляра'),
	(5, 'Электричество');
/*!40000 ALTER TABLE `fuels` ENABLE KEYS */;

-- Дамп структуры для таблица autoblog.state_car
CREATE TABLE IF NOT EXISTS `state_car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_car` varchar(32) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы autoblog.state_car: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `state_car` DISABLE KEYS */;
INSERT INTO `state_car` (`id`, `state_car`) VALUES
	(1, 'Новая'),
	(2, 'Подержанная');
/*!40000 ALTER TABLE `state_car` ENABLE KEYS */;

-- Дамп структуры для таблица autoblog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы autoblog.users: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `login`, `password`, `email`) VALUES
	(1, 'admin', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 'admin@admin'),
	(2, 'alex', 'pass', 'email@em.ru'),
	(3, 'alex2', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 'alex@al.ru'),
	(4, 'sergey', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'serg@serg.ru'),
	(5, 'sdf', '18ee24150dcb1d96752a4d6dd0f20dfd8ba8c38527e40aa8509b7adecf78f9c6', 'kiryshka@ukr.net'),
	(6, 'sdfddd', '18ee24150dcb1d96752a4d6dd0f20dfd8ba8c38527e40aa8509b7adecf78f9c6', 'Oleh1994bas@mail.ru');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
