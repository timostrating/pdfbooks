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
    ('Nederlands', 'Een veel gebruikt boek voor het vak Nederlands', 'https://placeimg.com/500/480?text=Nederlands', '7.25', '2'),
    ('Engels', 'Een veel gebruikt boek voor het vak Engels', 'https://placeimg.com/700/450?text=Engels', '8,99', '1'),
    ('Project management', 'Een veel gebruikt boek voor het vak project management', 'https://placeimg.com/600/600?text=Project+managment', '30,00', '3'),
    ('Gesprekken in organisaties', 'Een veel gebruikt boek voor het vak comminicatieskills', 'https://www.studystore.nl/images/9789001875275/1/1', '7,99', '4'),
    ('Fundamentals of Business Process Management', 'Het beste boek voor process management', 'https://www.studystore.nl/images/9783642331428/1/1', '3,99', '5'),
    ('Programmeren in Java met BlueJ', 'Een boek voor de basis van Java', 'https://www.studystore.nl/images/9789043034999/1/1', '4,99', '2'),
    ('Improving your writing and speaking', 'Een boek voor het van Engels', 'https://www.studystore.nl/images/9789001862602/1/1', '6,99', '2'),
    ('Security awareness', 'Het leren van beveiliging', 'https://www.studystore.nl/images/9789087537364/1/1', '11,99', '1'),
    ('Toegepaste wiskunde voor het hoger onderwijs', 'Een boek voor toegepaste wiskunde', 'https://www.studystore.nl/images/9789006144659/1/1', '21,99', '6'),
    ('Datavisualisatie', 'Een boek voor datavisualisatie', 'https://www.studystore.nl/images/9780970601988/1/1', '4,99', '1'),
    ('Learning MySQL', 'Een boek waar je dieper in gaat op MySQL', 'https://www.studystore.nl/images/9780596008642/1/1', '12,99', '7'),
    ('Communicatie', 'Boek boeker boekste boek', 'http://s3.amazonaws.com/libapps/accounts/16833/images/boek-bruin.png', '9,99', '8'),
    ('Wiskunde-a', 'Boek voor wiskunde', 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/2/1/1/8/1001004005378112.jpg', '2,99', '9'),
    ('Wiskunde-b', 'Boek voor wiskunde', 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/3/1/1/8/1001004005378113.jpg', '2,99', '10'),
    ('Wiskunde-c', 'Boek voor wiskunde', 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/5/2/8/5/1001004006295825.jpg', '2,99', '2'),
    ('Wiskunde-gt', 'Boek voor wiskunde', 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/0/1/3/0/1001004004930310.jpg', '2,99','5'),
    ('Praktische Verloskunde', 'Boek over verloskunde', 'https://www.berneboek.com/260715-large_default/praktische-verloskunde.jpg', '4,45', '2'),
    ('Module Ecologie en soortherkenning', 'Boek over soortherkenning', 'https://s.s-bol.com/imgbase0/imagebase/large/FC/3/4/5/1/1001004010441543.jpg', '12,99', '3'),
    ('CAD Tooling', 'Boek over CAD Tooling', 'https://www.schandpublishing.com/BookImages/schand-size180/9788121928748.jpg', '2,33', '4'),
    ('Domein Techniek', 'Boek over domein techniek', 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/2/4/1/5/9200000025535142.jpg', '9,99', '5'),
    ('Inleiding robotica hardware', 'Inleiding over de hardware van robotica', 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/2/3/9/1/9200000026891932.jpg', '2,12', '7'),
    ('Inleiding robotica software', 'Inleiding over de software van robotica', 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/0/8/2/8/9200000058338280.jpg', '18,99', '7'),
    ('Meettechniek', 'Boek over meettechniek', 'https://s.s-bol.com/imgbase0/imagebase3/large/FC/2/4/0/6/1001004005606042.jpg', '12,99', '6');");



// BLOGS
$DB->execute("CREATE TABLE Blogs (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR( 255 ) NOT NULL,  
    description TEXT NOT NULL,
    imgurl VARCHAR( 255 ) );");  
$DB->execute("INSERT INTO Blogs (title, description, imgurl) VALUES 
    ('Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis.', ' 
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>',
            'http://via.placeholder.com/550x350?text=Tes1'),
    ('Lorem ipsum dolor sit amet consectetur adipisicing elit. dolore voluptatibus maxime perspiciatis.', ' 
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>',
            'http://via.placeholder.com/550x350?text=Tes1'),
    ('Dolore voluptatibus maxime perspiciatis amet consectetur adipisicing elit.', ' 
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit voluptates, dolore voluptatibus maxime perspiciatis, exercitationem a distinctio ea modi esse quis labore veritatis quo odio perferendis non consequatur, laborum at. </p>',
            'http://via.placeholder.com/550x350?text=Tes1');");


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

$DB->execute("CREATE TABLE Pageviews (
    ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255) NOT NULL, 
    action VARCHAR(255) NOT NULL, 
    count INT(100) NOT NULL, 
    valid INT(1) NOT NULL );");