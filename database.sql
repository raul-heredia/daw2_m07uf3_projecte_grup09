use mysql;
create user 'admin'@'localhost' identified by "Fjeclot22@";
create database flyfly;
use flyfly;
grant all privileges on flyfly.* to 'admin'@'localhost';