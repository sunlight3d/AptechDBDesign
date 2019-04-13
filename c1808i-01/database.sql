CREATE DATABASE dbMerciado;
USE dbMerciado;
CREATE TABLE IF NOT EXISTS tblUsers(
    name VARCHAR(300),
    email VARCHAR(300),
    password_hash VARCHAR(400),
    phone VARCHAR(500) NOT NULL PRIMARY KEY,
    role VARCHAR(100), 
    dob DATE
);
--role = user,"admin",
CREATE TABLE IF NOT EXISTS tblRestaurants(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(300) NOT NULL,
    description TEXT,
    address TEXT,
    phone VARCHAR(100),
    imageURL VARCHAR(100)
);
CREATE TABLE IF NOT EXISTS tblEntertainments(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(300) NOT NULL,
    description TEXT,
    address TEXT,
    phone VARCHAR(100),
    imageURL VARCHAR(100)
);
CREATE TABLE IF NOT EXISTS tblGallerys(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(300) NOT NULL,
    description TEXT,
    address TEXT,
    phone VARCHAR(100),
    imageURL VARCHAR(100)
);
--Loai ve
CREATE TABLE IF NOT EXISTS tblTicketTypes(
	id VARCHAR(300) NOT NULL PRIMARY KEY,
    name VARCHAR(300) NOT NULL,
    description TEXT,
    price FLOAT
);
USE dbMerciado;
CREATE TABLE IF NOT EXISTS tblOrders(
	id VARCHAR(400),
	userPhone VARCHAR(500) NOT NULL,
	FOREIGN KEY (userPhone) REFERENCES tblUsers(phone),
	ticketTypeId VARCHAR(300) NOT NULL,
	FOREIGN KEY (ticketTypeId) REFERENCES tblTicketTypes(id),
	description TEXT,
	datetime DATETIME,
	numberOfTickets INTEGER DEFAULT 1
);
