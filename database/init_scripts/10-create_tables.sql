CREATE TABLE "User" (
    id integer AUTO_INCREMENT primary key,
    userName varchar(50) UNIQUE,
    "name" varchar(150),
    email varchar(100),
    birthDate date,
    gender ENUM(0,1)
);

CREATE TABLE "Movie" (
    id integer AUTO_INCREMENT primary key,
    "name" varchar(150),
    poster varchar(100),
    reviewAmount integer
);

CREATE TABLE "Review"(
    id integer AUTO_INCREMENT primary key,
    movie_id integer REFERENCES "Movie" (id),
    rating integer,
    reviewText text,
    isAnonymous boolean,
    createDataTime datetime,
    author varchar(50) references "User" (userName)
);

CREATE TABLE "Favourite" (
  movie_id integer REFERENCES "Movie" (id),
  user_id integer REFERENCES "User" (id)
);