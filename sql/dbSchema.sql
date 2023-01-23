DROP DATABASE if EXISTS BroodjeApp;
CREATE DATABASE  BroodjeApp;
USE BroodjeApp;

CREATE TABLE IF NOT EXISTS
beleg(
    belegId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    belegNaam varchar(20),
    belegPrijs float
);

CREATE TABLE IF NOT EXISTS
bestelling(
    bestellingId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    broodjeId int NOT NULL,
    cursistId int NOT NULL,
    bestellingDatum DATE
);

CREATE TABLE IF NOT EXISTS
broodje(
    broodjeId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    belegId int NOT NULL,
    formaatId int NOT NULL,
    sausId int NOT NULL,
    broodId int NOT NULL
);

CREATE TABLE IF NOT EXISTS
cursist(
    cursistId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email varchar(50),
    wachtwoord varchar(50)
);

CREATE TABLE IF NOT EXISTS
formaat(
    formaatId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    formaatNaam varchar(20),
    formaatPrijs float
);

CREATE TABLE IF NOT EXISTS
saus(
    sausId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sausNaam varchar(20),
    sausPrijs float
);

CREATE TABLE IF NOT EXISTS
brood(
    broodId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    broodNaam varchar(20),
    broodPrijs float
);

ALTER TABLE broodje
ADD CONSTRAINT FK_BelegBroodje
FOREIGN KEY broodje(belegId) REFERENCES beleg(belegId);

ALTER TABLE broodje
ADD CONSTRAINT FK_FormaatBroodje
FOREIGN KEY broodje(formaatId) REFERENCES formaat(formaatId);

ALTER TABLE broodje
ADD CONSTRAINT FK_SausBroodje
FOREIGN KEY broodje(sausId) REFERENCES saus(sausId);

ALTER TABLE broodje
ADD CONSTRAINT FK_BroodBroodje
FOREIGN KEY broodje(broodId) REFERENCES brood(broodId);

ALTER TABLE bestelling
ADD CONSTRAINT FK_BroodjeBestelling
FOREIGN KEY bestelling(broodjeId) REFERENCES broodje(broodjeId);

ALTER TABLE bestelling
ADD CONSTRAINT FK_CursistBestelling
FOREIGN KEY bestelling(cursistId) REFERENCES cursist(cursistId);