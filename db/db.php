<?php 

$db = new mysqli("localhost", "root", "");

$db->query("CREATE DATABASE IF NOT EXISTS library");
$db->select_db("library");

$db->query("CREATE TABLE admins (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email varchar(255) NOT NULL UNIQUE,
  hash varchar(255) NOT NULL UNIQUE) ");

$db->query("CREATE TABLE catalog (
  id  int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  title  varchar(255) NOT NULL DEFAULT 'Без названия',
  author  varchar(255) DEFAULT NULL,
  pubyear  int(11) DEFAULT NULL,
  price int(11) DEFAULT NULL) ");

$db->query("CREATE TABLE orders (
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