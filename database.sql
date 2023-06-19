-- Active: 1685437430041@@127.0.0.1@3306@symfony_course

DROP TABLE IF EXISTS course;

CREATE TABLE course (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    subject VARCHAR(255),
    content TEXT,
    published DATETIME
);

INSERT INTO course (title,subject,content,published) VALUES 
("Base du JS", "JS", "Le JS c'est quand même pas mal", "2023-04-15"),
("Le DOM", "JS", "C'est pour manipuler le HTML avec JS", "2023-05-11"),
("Base du PHP", "PHP", "Comme JS mais avec des $", "2023-05-25"),
("MYSQL", "database", "Le GOAT", "2023-06-01");