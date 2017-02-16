CREATE DATABASE bookup

#Creating the database

CREATE TABLE Accounts (
username VARCHAR(30) NOT NULL PRIMARY KEY,
password VARCHAR(30) NOT NULL,
name VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
mobile INT(15) NOT NULL
);

