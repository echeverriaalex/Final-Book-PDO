CREATE DATABASE booksdb;
USE booksdb;

CREATE TABLE users(
    userId INT AUTO_INCREMENT,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
	CONSTRAINT pk_users PRIMARY KEY(userId)
);

CREATE TABLE books(
    code INT AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    price INT NOT NULL,
    CONSTRAINT pk_books PRIMARY KEY (code)
);

INSERT INTO books (title, price) VALUES ("el resplandor", 500),("la torre oscura", 600), ("learning C", 700);
INSERT INTO users (email, password) VALUES ("user@gmail.com","123456"),("utn@gmail.com", "123456");

select * from books;
select * from users;