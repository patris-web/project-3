CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255),
    role ENUM('customer', 'admin')
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_name VARCHAR(255),
    book_year YEAR
);

CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author_name VARCHAR(255),
    birthday DATE
);

CREATE TABLE genre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    genre VARCHAR(255)
);

CREATE TABLE all_tables (
    alltable_id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    author_id INT,
    genre_id INT,
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (author_id) REFERENCES authors(id),
    FOREIGN KEY (genre_id) REFERENCES genre(id)
);