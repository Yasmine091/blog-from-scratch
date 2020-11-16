-- MySQL Script generated by MySQL Workbench
-- lun. 16 nov. 2020 15:19:25
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`auteurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`auteurs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL,
  `mot de passe` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `mydb`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `mydb`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`articles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(255) NOT NULL,
  `date_pub` DATE NULL,
  `img` VARCHAR(255) NULL,
  `tps_lect` INT NULL,
  `contenu` LONGTEXT NULL,
  `date_modif` DATE NULL,
  `auteur` INT(11) NULL,
  `categories` VARCHAR(45) NULL,
  `auteurs_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `auteurs_id`));


-- -----------------------------------------------------
-- Table `mydb`.`atricles_has_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`atricles_has_categories` (
  `atricles_id` INT(11) NOT NULL,
  `categories_id` INT(11) NOT NULL,
  PRIMARY KEY (`atricles_id`, `categories_id`));


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
