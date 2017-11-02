CREATE TABLE `gebruiker` (
	`gebruiker_id` int NOT NULL AUTO_INCREMENT,
	`naam` TEXT(20) NOT NULL,
	`wachtwoord` TEXT(64) NOT NULL,
	`email` TEXT(64) NOT NULL UNIQUE,
	`laatste_login` TIMESTAMP NOT NULL,
	`aanmaakdatum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`type` char(1) NOT NULL,
	PRIMARY KEY (`gebruiker_id`)
);

CREATE TABLE `adres` (
	`gebruiker_id` int NOT NULL,
	`plaats` TEXT(64) NOT NULL,
	`straat` TEXT(64) NOT NULL,
	`huisnummer` int NOT NULL,
	`toevoeging` TEXT,
	`postcode` TEXT NOT NULL,
	`land` TEXT NOT NULL,
	`provincie` TEXT NOT NULL,
	PRIMARY KEY (`gebruiker_id`)
);

CREATE TABLE `bestelling` (
	`bestelling_id` int NOT NULL AUTO_INCREMENT,
	`product_id` int NOT NULL,
	`gebruiker_id` int NOT NULL,
	`factuur_id` int NOT NULL,
	`besteldatum` TIMESTAMP NOT NULL,
	`afleverdatum` TIMESTAMP NOT NULL,
	`totaalprijs` FLOAT NOT NULL,
	PRIMARY KEY (`bestelling_id`)
);

CREATE TABLE `product` (
	`product_id` int NOT NULL AUTO_INCREMENT,
	`naam` TEXT NOT NULL AUTO_INCREMENT,
	`categorie` char(2) UNIQUE,
	`prijs` FLOAT NOT NULL,
	`omschrijving` TEXT,
	`afbeelding` TEXT,
	PRIMARY KEY (`product_id`)
);

CREATE TABLE `factuur` (
	`factuur_id` int NOT NULL AUTO_INCREMENT,
	`gebruiker_id` int NOT NULL,
	`bestelling_id` int NOT NULL,
	`status` char(1) NOT NULL DEFAULT 'N',
	`opmerking` TEXT NOT NULL,
	`betaaldatum` TIMESTAMP NOT NULL,
	`aanmaakdatum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`totaalbedrag` FLOAT NOT NULL,
	PRIMARY KEY (`factuur_id`)
);

CREATE TABLE `bestellingregel` (
	`bestellingregel_id` int NOT NULL AUTO_INCREMENT,
	`bestelling_id` int NOT NULL,
	`product_id` int NOT NULL,
	`aantal` int NOT NULL,
	`prijs` FLOAT NOT NULL,
	PRIMARY KEY (`bestellingregel_id`)
);

ALTER TABLE `adres` ADD CONSTRAINT `adres_fk0` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker`(`gebruiker_id`);

ALTER TABLE `bestelling` ADD CONSTRAINT `bestelling_fk0` FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`);

ALTER TABLE `bestelling` ADD CONSTRAINT `bestelling_fk1` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker`(`gebruiker_id`);

ALTER TABLE `bestelling` ADD CONSTRAINT `bestelling_fk2` FOREIGN KEY (`factuur_id`) REFERENCES `factuur`(`factuur_id`);

ALTER TABLE `factuur` ADD CONSTRAINT `factuur_fk0` FOREIGN KEY (`gebruiker_id`) REFERENCES `gebruiker`(`gebruiker_id`);

ALTER TABLE `factuur` ADD CONSTRAINT `factuur_fk1` FOREIGN KEY (`bestelling_id`) REFERENCES `bestelling`(`bestelling_id`);

ALTER TABLE `bestellingregel` ADD CONSTRAINT `bestellingregel_fk0` FOREIGN KEY (`bestelling_id`) REFERENCES `bestelling`(`bestelling_id`);

ALTER TABLE `bestellingregel` ADD CONSTRAINT `bestellingregel_fk1` FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`);
