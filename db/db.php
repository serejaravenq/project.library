<?php 

$db = new mysqli("localhost", "root", "");

$db->query("CREATE DATABASE IF NOT EXISTS library");
$db->select_db("library");

$db->query("CREATE TABLE IF NOT EXISTS admins (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email varchar(255) NOT NULL UNIQUE,
  hash varchar(255) NOT NULL UNIQUE) ");

$db->query("CREATE TABLE IF NOT EXISTS products(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(45) NOT NULL DEFAULT '',
  price int(11) DEFAULT NULL,
  quantity int(11) NOT NULL DEFAULT 1,
  thumbnail VARCHAR(255) NOT NULL DEFAULT '') "); 

$db->query("CREATE TABLE IF NOT EXISTS catalog (
  id  int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  title  varchar(255) NOT NULL DEFAULT 'Без названия',
  author  varchar(255) DEFAULT NULL,
  pubyear  int(11) DEFAULT NULL,
  price int(11) DEFAULT NULL) ");

$db->query("CREATE TABLE IF NOT EXISTS orders (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title varchar(255) NOT NULL DEFAULT '',
  author varchar(255) NOT NULL DEFAULT '',
  pubyear int(11) DEFAULT NULL,
  price int(11) DEFAULT NULL,
  quantity int(11) NOT NULL DEFAULT 1,
  orderid varchar(50) NOT NULL DEFAULT '',
  datetime int(11) DEFAULT NULL) ");

$db->close();
?>