CREATE DATABASE IF NOT EXISTS widelki;

USE widelki;

CREATE TABLE IF NOT EXISTS uzytkownicy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL,
    haslo VARCHAR(255) NOT NULL
);
--do zaimportowania w myadminie