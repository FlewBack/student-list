CREATE TABLE 
student(
FirstName VARCHAR(255) NOT NULL, SecondName VARCHAR(255) NOT NULL,
groupId VARCHAR(255) NOT NULL, points INT(3) NOT NULL,
email VARCHAR(255) UNIQUE NOT NULL, sex ENUM("Male","Female") NOT NULL,
registration ENUM("resident","nonresident") NOT NULL

);
