-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema usuarios
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `usuarios` ;

-- -----------------------------------------------------
-- Schema usuarios
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `usuarios` DEFAULT CHARACTER SET utf8 ;
USE `usuarios` ;

-- -----------------------------------------------------
-- Table `usuarios`.`table1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`table1` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `columna1` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuarios`.`table2`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios`.`table2` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `columna2` TINYINT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
