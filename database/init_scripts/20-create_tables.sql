CREATE TABLE `User` (
    id INT AUTO_INCREMENT primary key,
    userName varchar(50) UNIQUE,
    `name` varchar(150),
    email varchar(100),
    birthDate date,
    gender ENUM('0', '1'),
    passwordHash varchar(255),
    avatarLink varchar(255)
);

CREATE TABLE `PasswordToken` (
    id INT AUTO_INCREMENT primary key,
    userId INT REFERENCES `User`(id),
    created timestamp,
    token varchar(255) UNIQUE
);

CREATE TABLE `Movie` (
    id INT AUTO_INCREMENT primary key,
    `name` varchar(150),
    poster varchar(255),
    reviewAmount INT
);

CREATE TABLE `Review`(
    id INT AUTO_INCREMENT primary key,
    movie_id INT REFERENCES `Movie` (id),
    rating INT,
    reviewText text,
    isAnonymous boolean,
    createDataTime datetime,
    author varchar(50) references `User` (userName)
);

CREATE TABLE `Favourite` (
  movie_id INT REFERENCES `Movie` (id),
  user_id INT REFERENCES `User` (id)
);