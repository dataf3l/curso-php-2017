-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema marketplace
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema marketplace
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `marketplace` DEFAULT CHARACTER SET utf8 ;
USE `marketplace` ;

-- -----------------------------------------------------
-- Table `marketplace`.`dict`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marketplace`.`dict` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `label` VARCHAR(200) NOT NULL,
  `data_type` VARCHAR(45) NOT NULL,
  `is_filter` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marketplace`.`mascota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marketplace`.`mascota` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `raza` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `ciudad` VARCHAR(45) NOT NULL,
  `edad` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `marketplace`.`alert`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marketplace`.`alert` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(200) NOT NULL,
  `query` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
