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
