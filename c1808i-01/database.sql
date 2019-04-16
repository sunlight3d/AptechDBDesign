DROP TABLE tblUsers;
DROP TABLE tblRestaurants;
DROP TABLE tblEntertainments;
DROP TABLE tblGallerys;
DROP TABLE tblTicketTypes;
DROP TABLE tblOrders;
CREATE DATABASE dbMerciado;
USE dbMerciado;
CREATE TABLE IF NOT EXISTS tblUsers(
    name VARCHAR(300),
    email VARCHAR(300),
    password VARCHAR(400),
    phone VARCHAR(500) NOT NULL PRIMARY KEY,
    role VARCHAR(100), 
    dob DATE
);

DELETE FROM tblUsers WHERE 1=1;
INSERT INTO tblUsers(name, email, password, phone, role, dob) 
VALUES('hoang','hoang@gmail.com', '12345', '012364488', 'user', '1979-10-25'),
('hoangadmin','hoangadmin@gmail.com', '12345', '444768778', 'admin', '1993-10-25'),
('tkhoang','hoangtkkk@gmail.com', '12345', '0964896239', 'user', '1988-10-25');

--role = user,"admin",
CREATE TABLE IF NOT EXISTS tblRestaurants(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(300) NOT NULL,
    description TEXT,
    address TEXT,
    phone VARCHAR(100),
    imageURL VARCHAR(100)
);
INSERT INTO tblRestaurants(name, description, address, phone, imageURL)
VALUES("KFC Vietnam", "Day la KFC", "KFC Le Thanh Nghi", "1235666", 
	"https://upload.wikimedia.org/wikipedia/commons/5/57/Fr%C3%BChling_bl%C3%BChender_Kirschenbaum.jpg");
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
INSERT INTO tblTicketTypes(id, name, description, price)
VALUES('2', "choi weekend", "chi choi cuoi tuan nhe", 120);
USE dbMerciado;
DROP TABLE tblOrders;
CREATE TABLE IF NOT EXISTS tblOrders(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	userPhone VARCHAR(500) NOT NULL,
	FOREIGN KEY (userPhone) REFERENCES tblUsers(phone),
	ticketTypeId VARCHAR(300) NOT NULL,
	FOREIGN KEY (ticketTypeId) REFERENCES tblTicketTypes(id),
	description TEXT,
	datetime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	numberOfTickets INTEGER DEFAULT 1,
	active INTEGER DEFAULT 0
);
