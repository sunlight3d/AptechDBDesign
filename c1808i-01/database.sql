CREATE DATABASE dbMerciado;
CREATE TABLE IF NOT EXISTS tblUsers(
    userName VARCHAR(300),
    email VARCHAR(300),
    password_hash VARCHAR(400),
    phone VARCHAR(500) NOT NULL PRIMARY KEY,
    role VARCHAR(100), --user,"admin",
    dob DATE,
);

