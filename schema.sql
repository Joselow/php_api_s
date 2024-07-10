CREATE DATABASE notes_app_php;

USE notes_app_php;

CREATE TABLE notes(
  `uuid` varchar(255) NOT NULL UNIQUE,
  title varchar(255) NOT NULL,
  content text NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uuid`)
)