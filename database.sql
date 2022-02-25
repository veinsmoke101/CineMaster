create database if not exists cinemaster;
use cinemaster;
CREATE TABLE IF NOT EXISTS _user(
        user_id INT PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(50) NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        user_password VARCHAR(255) NOT NULL
    );

CREATE TABLE IF NOT EXISTS poste(
        poste_id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        category VARCHAR(255) UNIQUE NOT NULL,
        image VARCHAR(255) NOT NULL,
        poste_author INT NOT NULL,
        FOREIGN KEY (poste_author) REFERENCES _user (user_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS _comment(
       comment_id INT PRIMARY KEY AUTO_INCREMENT,
       comment_author INT NOT NULL,
       comment_poste INT NOT NULL,
       FOREIGN KEY (comment_author) REFERENCES _user (user_id) ON DELETE CASCADE,
       FOREIGN KEY (comment_poste) REFERENCES poste (poste_id) ON DELETE CASCADE

);
ALTER TABLE _comment
    ADD description VARCHAR (255) NOT NULL;

create or replace view post_comments
as select p.poste_id, u.firstname, u.lastname, _comment.description
from _comment
INNER JOIN poste p ON _comment.comment_poste = p.poste_id
INNER JOIN _user u ON _comment.comment_author = u.user_id;


