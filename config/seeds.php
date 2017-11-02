<?php 



$DB->dropDB();
$DB->createDB();


$DB->execute("CREATE TABLE users(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR( 100 ) NOT NULL,
    email VARCHAR( 255 ) NOT NULL, 
    password VARCHAR( 255 ) NOT NULL);");
$DB->execute("INSERT INTO users (username, email,  password) 
                VALUES  ('timo', 'pdfbooks@guster.com', 'lol123')");
    

$DB->execute("CREATE TABLE products (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ) NOT NULL,
    description VARCHAR( 255 ) NOT NULL, 
    imgurl VARCHAR( 255 ) NOT NULL, 
    price VARCHAR( 255 ) NOT NULL);");
$DB->execute("INSERT INTO products (name, description, imgurl, price) 
                VALUES ('Kokosnoten zijn geen specerijen', 'Een van de grootste boeken ooit', 'https://placeimg.com/640/480', '5.00')");


$DB->execute("CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`));");
$DB->execute("INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
(2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
(3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00);");
