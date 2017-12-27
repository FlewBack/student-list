CREATE TABLE 
student(
FirstName VARCHAR(255) NOT NULL, LastName VARCHAR(255) NOT NULL,
groupId VARCHAR(255) NOT NULL, points INT(3) NOT NULL,
email VARCHAR(255) UNIQUE NOT NULL, sex ENUM("Male","Female") NOT NULL,
registration ENUM("resident","nonresident") NOT NULL

);

INSERT INTO student VALUES ("Иван", "Иванов", "AB18", "286", "Ivanov@example.com", "Male", "resident");
INSERT INTO student VALUES ("Маша", "Иванова", "AB18", "211", "masha@example.com", "Female", "nonresident");
INSERT INTO student VALUES ("Иван", "Петров", "AB18", "198","petrov2020@example.com", "Male", "resident");
INSERT INTO student VALUES ("Максим", "Петренко", "AB18","193", "petrenkoMax@example.com", "Male", "resident");
INSERT INTO student VALUES ("Кот", "Ленивый", "AB18", "158", "lazyCat@meow.com", "Male", "resident");

INSERT INTO student VALUES ("Константин", "Котов", "CA17", "276", "konstantin@example.com", "Male", "resident");
INSERT INTO student VALUES ("Ева", "Иванова", "CA17", "214", "Eva@example.com", "Female", "nonresident");
INSERT INTO student VALUES ("Дмитрий", "Захаров", "CA17", "195","dmitry@example.com", "Male", "resident");
INSERT INTO student VALUES ("Евгений", "Орлов", "CA17","192", "orlov@example.com", "Male", "resident");
INSERT INTO student VALUES ("Анатолий", "Макаров", "CA17", "153", "makarovtolya@meow.com", "Male", "resident");

INSERT INTO student VALUES ("Кирилл", "Котик", "DA13", "272", "kostyakotik@example.com", "Male", "resident");
INSERT INTO student VALUES ("Полина", "Кирова", "DA13", "218", "polina@example.com", "Female", "nonresident");
INSERT INTO student VALUES ("Арина", "Орлова", "DA13", "151","orlova@example.com", "Female", "resident");
INSERT INTO student VALUES ("Евгений", "Иванов", "DA13","257", "evgeny@example.com", "Male", "resident");
INSERT INTO student VALUES ("Тома", "Макарова", "DA13", "159", "makarovatoma@meow.com", "Female", "resident");

INSERT INTO student VALUES ("Том", "Петров", "PA17", "300", "tompetrov@example.com", "Male", "resident");
INSERT INTO student VALUES ("Анатолий", "Орлов", "PA17", "165", "orlovTolya@example.com", "Female", "nonresident");
INSERT INTO student VALUES ("Артем", "Захаров", "PA17", "190","artemzaharov@example.com", "Male", "resident");
INSERT INTO student VALUES ("Даниил", "Вязин", "PA17","152", "danyavyazin@example.com", "Male", "resident");
INSERT INTO student VALUES ("Ира", "Макарова", "PA17", "241", "makarovaIra@meow.com", "Male", "resident");