<?php
require('../includes/sql_connect.php');
require('../includes/ft_util.php');
scream();

$q = "CREATE DATABASE IF NOT EXISTS matcha";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS `matcha`.`users` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) NOT NULL , `first_name` VARCHAR(120) NOT NULL , `last_name` VARCHAR(120) NOT NULL , `gender` ENUM('M','F') NOT NULL , `preferences` ENUM('M','F','B') NOT NULL DEFAULT 'B' , `DOB` DATE NOT NULL , `email` VARCHAR(80) NOT NULL , `password` VARCHAR(180) NOT NULL , `notifications` ENUM('T','F') NOT NULL DEFAULT 'T' , `rating` TINYINT NOT NULL DEFAULT '5' , `online` ENUM('T','F') NOT NULL , `last_seen` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `valid` ENUM('T','F') NOT NULL DEFAULT 'F' , `verified` ENUM('T','F') NOT NULL , `biography` VARCHAR(4000) NOT NULL , `last_modified` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE (`username`), UNIQUE (`email`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`tokens` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `token` VARCHAR(180) NOT NULL , `request` ENUM('registration','verification','password_reset','email_reset','username_reset') NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE (`token`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`likes` ( `id` INT NOT NULL , `liker` INT NOT NULL , `liked` INT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`locations` ( `id` INT NOT NULL AUTO_INCREMENT , `location` GEOMETRY NOT NULL , `street_address` VARCHAR(180) NOT NULL , `area` VARCHAR(80) NOT NULL , `state` VARCHAR(80) NOT NULL , `country` VARCHAR(80) NOT NULL , `user_id` INT NOT NULL , `last_modified` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`tags` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(120) NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE (`name`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`user_tags` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `tag_id` INT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`images` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(120) NOT NULL , `user_id` INT NOT NULL , `profile_pic` ENUM('T','F') NOT NULL DEFAULT 'F' , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE (`name`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`views` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `viewer` INT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`user_chat` ( `id` INT NOT NULL AUTO_INCREMENT , `user_one` INT NOT NULL , `user_two` INT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`messages` ( `id` INT NOT NULL AUTO_INCREMENT , `chat_id` INT NOT NULL , `user_id` INT NOT NULL , `message` VARCHAR(4000) NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`fake_accounts` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `validated` ENUM('T','F') NOT NULL , `last_modified` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`blocked_accounts` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `blocked_user` INT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`notifications` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `viewed` ENUM('T','F') NOT NULL DEFAULT 'F' , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`like_notifications` ( `id` INT NOT NULL AUTO_INCREMENT , `notification_id` INT NOT NULL , `like_id` INT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), UNIQUE (`like_id`), UNIQUE (`notification_id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`chat_notifications` ( `id` INT NOT NULL AUTO_INCREMENT , `notification_id` INT NOT NULL , `message_id` INT NOT NULL , `date_created` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`unlike_notifications` ( `id` INT NOT NULL AUTO_INCREMENT , `notification_id` INT NOT NULL , `liker` INT NOT NULL , `liked` INT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";

$q = "CREATE TABLE IF NOT EXISTS  `matcha`.`views_notifications` ( `id` INT NOT NULL AUTO_INCREMENT , `notification_id` INT NOT NULL , `view_id` INT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB";
$result = $dbc->prepare($q);
$result->execute();
