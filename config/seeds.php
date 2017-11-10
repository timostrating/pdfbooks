<?php 

/**
 *  This file is responsible for building a testable database
 */

require_once(__DIR__."/../core/helpers.php");  // we do not know for sure from where the file gets loaded. 

$DB->dropDB();
$DB->createDB();


// USER_TYPES
$DB->execute("CREATE TABLE User_types (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 255 ) NOT NULL);");  
$DB->execute("INSERT INTO user_types (name) VALUES ('user'), ('admin')");


// USERS
$DB->execute("CREATE TABLE Users (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ),
    last_name VARCHAR( 100 ),
    email VARCHAR( 255 ),
    password VARCHAR( 128 ),
    user_type_id INT(8), 
    CONSTRAINT `fk_User_profile_User_status`
        FOREIGN KEY (`user_type_id`)
        REFERENCES `user_types` (`id`) );");
$DB->execute("INSERT INTO users (name, last_name, email, password, user_type_id) VALUES 
    ('user', 'Veenstra', 'user@pdfbooks.nl', '".good_hash("lol123")."', '1'),
    ('admin', 'Baans', 'admin@pdfbooks.nl', '".good_hash("lol123")."', '2'),
    ('Jan', 'Duin', 'jan@pdfbooks.nl', '".good_hash("lol123")."', '1'),
    ('Willem', 'Oranje', 'willem@pdfbooks.nl', '".good_hash("lol123")."', '1'),
    ('Henk', 'Beer', 'henk@pdfbooks.nl', '".good_hash("lol123")."', '1')");

/*

    name VARCHAR( 100 ),
    first_name VARCHAR( 100 ),
    last_name VARCHAR( 100 ),
    email VARCHAR( 255 ),
    password VARCHAR( 128 ),
    gender VARCHAR( 100 ),
    country VARCHAR( 100 ),
    state VARCHAR( 100 ),
    city VARCHAR( 100 ),
    street VARCHAR( 100 ),
    street_number VARCHAR( 20 ),
    postal_code VARCHAR( 20 ),

*/



// PRODUCTS
$DB->execute("CREATE TABLE Products (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 255 ) NOT NULL,
    description VARCHAR( 255 ) NOT NULL, 
    imgurl VARCHAR( 255 ) NOT NULL, 
    price VARCHAR( 255 ) NOT NULL,
    categorie_id VARCHAR( 8 ) );");
$DB->execute("INSERT INTO products (name, description, imgurl, price, categorie_id) VALUES 
    ('Kokosnoten zijn geen specerijen', 'Een van de grootste boeken ooit', 'http://via.placeholder.com/550x350?text=Kokosnoten', '12.50', '1'),
    ('Piraten en de 7 dwergen', 'Een spanend avontuur', 'http://via.placeholder.com/350x550?text=Piraten', '5.00', '2'),
    ('Nederlands', 'Een veel gebruikt boek voor het vak Nederlands', 'https://placeimg.com/500/480?text=Nederlands', '7.25', '1'),
    ('Engels', 'Een veel gebruikt boek voor het vak Engels', 'https://placeimg.com/700/450?text=Engels', '8,99', '2'),
    ('Project management', 'Een veel gebruikt boek voor het vak project management', 'https://placeimg.com/600/600?text=Project+managment', '30,00', '1')");


// BLOGS
$DB->execute("CREATE TABLE Blogs (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR( 255 ) NOT NULL,  
    description TEXT NOT NULL,
    imgurl VARCHAR( 255 ) );");  
$DB->execute("INSERT INTO Blogs (title, description, imgurl) VALUES 
    ('test1', 'Dit is de eerste text', 'http://via.placeholder.com/550x350?text=Tes1'), 
    ('test2', 'Dit is een Iets langere text', 'http://via.placeholder.com/550x350?text=Test2')");


// CONTACTS
$DB->execute("CREATE TABLE Contacts (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ) NOT NULL,  
    email VARCHAR( 255 ) NOT NULL,  
    description VARCHAR( 4096 ) NOT NULL);");  
$DB->execute("INSERT INTO Contacts (name, email, description) VALUES 
    ('test1', 'test@pdfbooks.nl', 'Dit is een test berichtje gegenereerd vanuit de seeds file.')");
 

 
// ORDERS
$DB->execute("CREATE TABLE Orders(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ) NOT NULL,
    user_id INT(8) NOT NULL );");  
$DB->execute("INSERT INTO Orders (name) VALUES ('test1'), ('test2')");



$DB->execute("CREATE TABLE ProductsOrders (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    order_id INT(8) NOT NULL, 
    product_id INT(8) NOT NULL );");
 

// CATEGORIES
$DB->execute("CREATE TABLE Categories(
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 100 ) NOT NULL);");  
$DB->execute("INSERT INTO Categories (name) VALUES 
    ('Communicatie & Talen'),
    ('Economie'),
    ('Exact, Techniek & Onderzoek'),
    ('Management & Bedrijfskunde'),
    ('Marketing'),
    ('Persoonlijke & professionele ontwikkeling'),
    ('Recht'),
    ('Sociale wetenschappen & gezondheidszorg') ");