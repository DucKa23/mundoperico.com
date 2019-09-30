-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema usuarios
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

CREATE TABLE IF NOT EXISTS `usuario` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `login` ;

CREATE TABLE IF NOT EXISTS `login` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nick` VARCHAR(45) NULL DEFAULT NULL,
  `contraseña` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nick` VARCHAR(45) NULL DEFAULT NULL,
  `contraseña` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `login_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `login_id`),
  INDEX `fk_usuario_login_idx` (`login_id` ASC),
  CONSTRAINT `fk_usuario_login`
    FOREIGN KEY (`login_id`)
    REFERENCES `login` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `login`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `login` (`id`, `nick`, `contraseña`) VALUES (1, 'Juan23', '12345');
INSERT INTO `login` (`id`, `nick`, `contraseña`) VALUES (2, 'Juan24', '12345');
INSERT INTO `login` (`id`, `nick`, `contraseña`) VALUES (3, 'Juan25', '12345');
INSERT INTO `login` (`id`, `nick`, `contraseña`) VALUES (4, 'Juan26', '12345');

COMMIT;


-- -----------------------------------------------------
-- Data for table `usuario`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `usuario` (`id`, `nick`, `contraseña`, `email`, `login_id`) VALUES (1, 'Juan23', '12345', 'juan23@gmail.com', DEFAULT);
INSERT INTO `usuario` (`id`, `nick`, `contraseña`, `email`, `login_id`) VALUES (2, 'Juan24', '12345', 'juan24@gmail.com', DEFAULT);
INSERT INTO `usuario` (`id`, `nick`, `contraseña`, `email`, `login_id`) VALUES (3, 'Juan25', '12345', 'juan25@gmail.com', DEFAULT);
INSERT INTO `usuario` (`id`, `nick`, `contraseña`, `email`, `login_id`) VALUES (4, 'Juan26', '12345', 'juan26@gmail.com', DEFAULT);

COMMIT;

