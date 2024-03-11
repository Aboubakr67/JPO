DROP DATABASE IF EXISTS bddclient;
CREATE DATABASE bddclient;
USE bddclient;

CREATE TABLE client (
    numC int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nomC VARCHAR(25) NOT NULL,
    villeC VARCHAR(25) NOT NULL
    );





USE bddclient;

INSERT INTO client (nomC,villeC) VALUES ("Dupond","Strasbourg"),
("Durand","Mulhouse"),
("Lignac","Colmar"),
("Ledru","Saint-Etienne"),
("Miller","Paris"),
("Sels","Mouscron");