CREATE DATABASE final;
CREATE TABLE comments;
ALTER TABLE comments
    ADD firstName VARCHAR(50),
    ADD lastName VARCHAR(50),
    ADD userComment LONGTEXT;
