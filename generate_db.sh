mysql <<EOFMYSQL
use rbg002;
show tables;

DROP TABLE IF EXISTS UserBundle;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Bundle;
DROP TABLE IF EXISTS BoosterPack;

CREATE TABLE BoosterPack (
    BoosterPackID INT PRIMARY KEY,
    Name VARCHAR(50),
    BundleName VARCHAR(100)
);


CREATE TABLE Bundle (
    BundleName VARCHAR(100) PRIMARY KEY,
    Price DECIMAL(5,2),
    Region VARCHAR(50),
    BoosterPackType VARCHAR(100)
);

CREATE TABLE User (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(50),
    Age INT,
    Email VARCHAR(100)
);

CREATE TABLE UserBundle (
    UserID INT,
    BundleName VARCHAR(100),
    PRIMARY KEY (UserID, BundleName),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (BundleName) REFERENCES Bundle(BundleName)
);

EOFMYSQL