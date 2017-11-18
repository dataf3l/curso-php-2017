
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema curso
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema curso
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `curso` DEFAULT CHARACTER SET utf8 ;
USE `curso` ;

-- -----------------------------------------------------
-- Table `curso`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `curso`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `curso`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `curso`.`estado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `curso`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `curso`.`post` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NULL,
  `contenido` TEXT NULL,
  `usuario_id` INT NOT NULL,
  `estado_id` INT NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`),
  INDEX `fk_post_usuario_idx` (`usuario_id` ASC),
  INDEX `fk_post_estado1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_post_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `curso`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `curso`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `curso`.`estado`
-- -----------------------------------------------------
START TRANSACTION;
USE `curso`;
INSERT INTO `curso`.`estado` (`id`, `nombre`) VALUES (1, 'ACTIVO');
INSERT INTO `curso`.`estado` (`id`, `nombre`) VALUES (2, 'INACTIVO');

COMMIT;



