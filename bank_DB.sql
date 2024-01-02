CREATE DATABASE IF NOT EXISTS bank_System;
CREATE TABLE ACCOUNTS (
	CODE INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	NOM VARCHAR(255) NOT NULL,
	PRENOM VARCHAR(255) NOT NULL ,
	ADRESSE VARCHAR(255) NOT NULL ,
	CATEGORY VARCHAR(255) NOT NULL ,
	DEVISE VARCHAR(255) NOT NULL ,
	PASSWOR VARCHAR(255) NOT NULL ,
	BALANCE FLOAT NOT NULL 
)

CREATE TABLE OPERATION(
	ID_OP INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
	ACCOUNT INT NOT NULL,
	DATEOP DATE NOT NULL ,
	TYPEOP VARCHAR(255) NOT NULL, 
	STATUSOP VARCHAR(255) NOT NULL, 
	BALANCEOP FLOAT NOT NULL,
	AMOUNT FLOAT NOT NULL
)


