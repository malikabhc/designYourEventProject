#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE DATABASE `designYourEvent`;
USE `designYourEvent`;

#------------------------------------------------------------
# Table: ye27d_eventsCategory
#------------------------------------------------------------

CREATE TABLE `ye27d_eventsCategory`(
        `id`            Int  Auto_increment  NOT NULL ,
        `eventCategory` Varchar (100) NOT NULL
	,CONSTRAINT ye27d_eventsCategory_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_eventsType
#------------------------------------------------------------

CREATE TABLE `ye27d_eventsType`(
        `id`        Int  Auto_increment  NOT NULL ,
        `eventType` Varchar (100) NOT NULL
	,CONSTRAINT ye27d_eventsType_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_sponsors
#------------------------------------------------------------

CREATE TABLE `ye27d_sponsors`(
        `id`          Int  Auto_increment  NOT NULL ,
        `sponsorName` Varchar (255) NOT NULL ,
        `sponsorLink` Varchar (255) NOT NULL ,
        `sponsorLogo` Varchar (255) NOT NULL
	,CONSTRAINT ye27d_sponsors_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_contributors
#------------------------------------------------------------

CREATE TABLE `ye27d_contributors`(
        `id`                   Int  Auto_increment  NOT NULL ,
        `lastnameContributor`  Varchar (100) NOT NULL ,
        `firstnameContributor` Varchar (100) NOT NULL
	,CONSTRAINT ye27d_contributors_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_department
#------------------------------------------------------------

CREATE TABLE `ye27d_department`(
        `id`             Int  Auto_increment  NOT NULL ,
        `departmentName` Varchar (255) NOT NULL ,
        `departmentCode` VARCHAR (10) NOT NULL
	,CONSTRAINT ye27d_department_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_city
#------------------------------------------------------------

CREATE TABLE `ye27d_city`(
        `id`                  Int  Auto_increment  NOT NULL ,
        `cityName`            Varchar (255) NOT NULL ,
        `postalCode`          VARCHAR (10) NOT NULL ,
        `idDepartment` Int NOT NULL
	,CONSTRAINT ye27d_city_PK PRIMARY KEY (`id`)

	,CONSTRAINT ye27d_city_ye27d_department_FK FOREIGN KEY (`idDepartment`) REFERENCES `ye27d_department`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_users
#------------------------------------------------------------

CREATE TABLE `ye27d_users`(
        `id`            Int  Auto_increment  NOT NULL ,
        `lastname`      Varchar (100) NOT NULL ,
        `firstname`     Varchar (100) NOT NULL ,
        `birthdate`     Date NOT NULL ,
        `email`         Varchar (200) NOT NULL ,
        `password`      Char (150) NOT NULL ,
        `idCity` Int NOT NULL
	,CONSTRAINT ye27d_users_PK PRIMARY KEY (`id`)

	,CONSTRAINT ye27d_users_ye27d_city_FK FOREIGN KEY (`idCity`) REFERENCES `ye27d_city`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_events
#------------------------------------------------------------

CREATE TABLE `ye27d_events`(
        `id`                      Int  Auto_increment  NOT NULL ,
        `eventName`               Varchar (255) NOT NULL ,
        `address`                 Varchar (255) NOT NULL ,
        `dateHourStart`           Date NOT NULL ,
        `dateHourFinish`          Date NOT NULL ,
        `eventDescription`        Varchar (255) NOT NULL ,
        `facebookLink`            Varchar (255) NOT NULL ,
        `twitterLink`             Varchar (255) NOT NULL ,
        `instagramLink`           Varchar (255) NOT NULL ,
        `snapchatLink`            Varchar (255) NOT NULL ,
        `idUsers`          Int NOT NULL ,
        `idEventsType`     Int NOT NULL ,
        `idEventsCategory` Int NOT NULL
	,CONSTRAINT ye27d_events_PK PRIMARY KEY (`id`)

	,CONSTRAINT ye27d_events_ye27d_users_FK FOREIGN KEY (`idUsers`) REFERENCES `ye27d_users`(`id`)
	,CONSTRAINT ye27d_events_ye27d_eventsType0_FK FOREIGN KEY (`idEventsType`) REFERENCES `ye27d_eventsType`(`id`)
	,CONSTRAINT ye27d_events_ye27d_eventsCategory1_FK FOREIGN KEY (`idEventsCategory`) REFERENCES `ye27d_eventsCategory`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_ticketing
#------------------------------------------------------------

CREATE TABLE `ye27d_ticketing`(
        `id`              Int  Auto_increment  NOT NULL ,
        `ticketingName`   Varchar (200) NOT NULL ,
        `ticketingLink`   Varchar (100) NOT NULL ,
        `idEvents` Int NOT NULL
	,CONSTRAINT ye27d_ticketing_PK PRIMARY KEY (`id`)

	,CONSTRAINT ye27d_ticketing_ye27d_events_FK FOREIGN KEY (`idEvents`) REFERENCES `ye27d_events`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_comments
#------------------------------------------------------------

CREATE TABLE `ye27d_comments`(
        `id`              Int  Auto_increment  NOT NULL ,
        `comments`        Varchar (100) NOT NULL ,
        `notation`        Varchar (100) NOT NULL ,
        `idUsers`  Int NOT NULL ,
        `idEvents` Int NOT NULL
	,CONSTRAINT ye27d_comments_PK PRIMARY KEY (`id`)

	,CONSTRAINT ye27d_comments_ye27d_users_FK FOREIGN KEY (`idUsers`) REFERENCES `ye27d_users`(`id`)
	,CONSTRAINT ye27d_comments_ye27d_events0_FK FOREIGN KEY (`idEvents`) REFERENCES `ye27d_events`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_sponsorsInEvents
#------------------------------------------------------------

CREATE TABLE `ye27d_sponsorsInEvents`(
        `id`                Int  Auto_increment  NOT NULL ,
        `idSponsors` Int NOT NULL ,
        `idEvents`   Int NOT NULL
	,CONSTRAINT ye27d_sponsorsInEvents_PK PRIMARY KEY (`id`)

	,CONSTRAINT ye27d_sponsorsInEvents_ye27d_sponsors_FK FOREIGN KEY (`idSponsors`) REFERENCES `ye27d_sponsors`(`id`)
	,CONSTRAINT ye27d_sponsorsInEvents_ye27d_events0_FK FOREIGN KEY (`idEvents`) REFERENCES `ye27d_events`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_contributorsInEvents
#------------------------------------------------------------

CREATE TABLE `ye27d_contributorsInEvents`(
        `id`                    Int  Auto_increment  NOT NULL ,
        `idEvents`       Int NOT NULL ,
        `idContributors` Int NOT NULL
	,CONSTRAINT ye27d_contributorsInEvents_PK PRIMARY KEY (`id`)

	,CONSTRAINT ye27d_contributorsInEvents_ye27d_events_FK FOREIGN KEY (`idEvents`) REFERENCES `ye27d_events`(`id`)
	,CONSTRAINT ye27d_contributorsInEvents_ye27d_contributors0_FK FOREIGN KEY (`idContributors`) REFERENCES `ye27d_contributors`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ye27d_participatingEvents
#------------------------------------------------------------

CREATE TABLE `ye27d_participatingEvents`(
        `id`              Int  Auto_increment  NOT NULL ,
        `idEvents` Int NOT NULL ,
        `idUsers`  Int NOT NULL
	,CONSTRAINT ye27d_participatingEvents_PK PRIMARY KEY (`id`)

	,CONSTRAINT ye27d_participatingEvents_ye27d_events_FK FOREIGN KEY (`idEvents`) REFERENCES `ye27d_events`(`id`)
	,CONSTRAINT ye27d_participatingEvents_ye27d_users0_FK FOREIGN KEY (`idUsers`) REFERENCES `ye27d_users`(`id`)
)ENGINE=InnoDB;
