<?php 


$DB->dropDB();
$DB->createDB();



// USER_TYPES
$DB->execute("CREATE TABLE user_types(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ) NOT NULL);");  
$DB->execute("INSERT INTO user_types (name) VALUES ('user')");
$DB->execute("INSERT INTO User_types (name) VALUES ('admin')");


// USERS
$DB->execute("CREATE TABLE Users(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR( 100 ) NOT NULL,
    email VARCHAR( 255 ) NOT NULL,
    password VARCHAR( 255 ) NOT NULL,
    user_type_id INT(8) NOT NULL, 
    CONSTRAINT `fk_User_profile_User_status`
        FOREIGN KEY (`user_type_id`)
        REFERENCES `user_types` (`id`) );");
$DB->execute("INSERT INTO users (username, email, password, user_type_id) 
                VALUES  ('timo', 'pdfbooks@guster.com', 'lol123', '1')");

// PRODUCTS
$DB->execute("CREATE TABLE Products (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ) NOT NULL,
    description VARCHAR( 255 ) NOT NULL, 
    imgurl VARCHAR( 255 ) NOT NULL, 
    price VARCHAR( 255 ) NOT NULL);");
$DB->execute("INSERT INTO products (name, description, imgurl, price) 
                VALUES ('Kokosnoten zijn geen specerijen', 'Een van de grootste boeken ooit', 'https://placeimg.com/640/480', '5.00')");


// $DB->execute("CREATE TABLE `gebruiker` (
// 	`gebruiker_id` int NOT NULL AUTO_INCREMENT,
// 	`naam` TEXT(20) NOT NULL,
// 	`wachtwoord` TEXT(64) NOT NULL,
// 	`email` TEXT(64) NOT NULL UNIQUE,
// 	`laatste_login` TIMESTAMP NOT NULL,
// 	`aanmaakdatum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
// 	`type` char(1) NOT NULL,
// 	PRIMARY KEY (`gebruiker_id`)
// );");

// $DB->execute("CREATE TABLE `adres` (
// 	`gebruiker_id` int NOT NULL,
// 	`plaats` TEXT(64) NOT NULL,
// 	`straat` TEXT(64) NOT NULL,
// 	`huisnummer` int NOT NULL,
// 	`toevoeging` TEXT,
// 	`postcode` TEXT NOT NULL,
// 	`land` TEXT NOT NULL,
// 	`provincie` TEXT NOT NULL,
// 	PRIMARY KEY (`gebruiker_id`)
// );");

// $DB->execute("CREATE TABLE `bestelling` (
// 	`bestelling_id` int NOT NULL AUTO_INCREMENT,
// 	`product_id` int NOT NULL,
// 	`gebruiker_id` int NOT NULL,
// 	`factuur_id` int NOT NULL,
// 	`besteldatum` TIMESTAMP NOT NULL,
// 	`afleverdatum` TIMESTAMP NOT NULL,
// 	`totaalprijs` FLOAT NOT NULL,
// 	PRIMARY KEY (`bestelling_id`)
// );");

// $DB->execute("CREATE TABLE `product` (
// 	`product_id` int NOT NULL AUTO_INCREMENT,
// 	`naam` TEXT NOT NULL AUTO_INCREMENT,
// 	`categorie` char(2) UNIQUE,
// 	`prijs` FLOAT NOT NULL,
// 	`omschrijving` TEXT,
// 	`afbeelding` TEXT,
// 	PRIMARY KEY (`product_id`)
// );");

// $DB->execute("CREATE TABLE `factuur` (
// 	`factuur_id` int NOT NULL AUTO_INCREMENT,
// 	`gebruiker_id` int NOT NULL,
// 	`bestelling_id` int NOT NULL,
// 	`status` char(1) NOT NULL DEFAULT 'N',
// 	`opmerking` TEXT NOT NULL,
// 	`betaaldatum` TIMESTAMP NOT NULL,
// 	`aanmaakdatum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
// 	`totaalbedrag` FLOAT NOT NULL,
// 	PRIMARY KEY (`factuur_id`)
// );");

// $DB->execute("CREATE TABLE `bestellingregel` (
// 	`bestellingregel_id` int NOT NULL AUTO_INCREMENT,
// 	`bestelling_id` int NOT NULL,
// 	`product_id` int NOT NULL,
// 	`aantal` int NOT NULL,
// 	`prijs` FLOAT NOT NULL,
// 	PRIMARY KEY (`bestellingregel_id`)
// );");

// $DB->execute("ALTER TABLE `adres` ADD CONSTRAINT `adres_fk0` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker`(`gebruiker_id`);");
// $DB->execute("ALTER TABLE `bestelling` ADD CONSTRAINT `bestelling_fk0` FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`);");
// $DB->execute("ALTER TABLE `bestelling` ADD CONSTRAINT `bestelling_fk1` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker`(`gebruiker_id`);");
// $DB->execute("ALTER TABLE `bestelling` ADD CONSTRAINT `bestelling_fk2` FOREIGN KEY (`factuur_id`) REFERENCES `factuur`(`factuur_id`);");
// $DB->execute("ALTER TABLE `factuur` ADD CONSTRAINT `factuur_fk0` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker`(`gebruiker_id`);");
// $DB->execute("ALTER TABLE `factuur` ADD CONSTRAINT `factuur_fk1` FOREIGN KEY (`bestelling_id`) REFERENCES `bestelling`(`bestelling_id`);");
// $DB->execute("ALTER TABLE `bestellingregel` ADD CONSTRAINT `bestellingregel_fk0` FOREIGN KEY (`bestelling_id`) REFERENCES `bestelling`(`bestelling_id`);");
// $DB->execute("ALTER TABLE `bestellingregel` ADD CONSTRAINT `bestellingregel_fk1` FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`);");



// tblproduct is de tabel die gebruikt is in branch backend: public/winkelwagen.php
// dit moet nog veranderd worden naar tabel product hierboven

// $DB->execute("CREATE TABLE IF NOT EXISTS `tblproduct` (
//   `id` int(8) NOT NULL AUTO_INCREMENT,
//   `name` varchar(255) NOT NULL,
//   `code` varchar(255) NOT NULL,
//   `image` text NOT NULL,
//   `price` double(10,2) NOT NULL,
//   PRIMARY KEY (`id`),
//   UNIQUE KEY `product_code` (`code`));");
// $DB->execute("INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
// (1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
// (2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
// (3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00);"); */
