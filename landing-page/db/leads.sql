-- MySQL Script generated by MySQL Workbench
-- Sun Jan  6 14:58:01 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema join_asbr
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema join_asbr
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `join_asbr` DEFAULT CHARACTER SET utf8 ;
USE `join_asbr` ;

-- -----------------------------------------------------
-- Table `join_asbr`.`leads`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `join_asbr`.`leads` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `regiao` VARCHAR(13) NOT NULL,
  `unidade` VARCHAR(100) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `score` INT NOT NULL,
  `data_registro` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
