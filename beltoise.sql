-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema beltoise
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema beltoise
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `beltoise` DEFAULT CHARACTER SET utf8 ;
USE `beltoise` ;

-- -----------------------------------------------------
-- Table `beltoise`.`maconnerie_slider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltoise`.`maconnerie_slider` (
  `id` INT NOT NULL,
  `image` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'slider maconnerie';


-- -----------------------------------------------------
-- Table `beltoise`.`company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltoise`.`company` (
  `id` VARCHAR(250) NOT NULL,
  `content` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'coordonnées société';


-- -----------------------------------------------------
-- Table `beltoise`.`maconnerie_text`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltoise`.`maconnerie_text` (
  `id` VARCHAR(250) NOT NULL,
  `prestation` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'liste prestations maconnerie';


-- -----------------------------------------------------
-- Table `beltoise`.`realeco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltoise`.`realeco` (
  `id` VARCHAR(250) NOT NULL,
  `image` VARCHAR(250) NULL,
  `text` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'images et descriptions des tuiles';


-- -----------------------------------------------------
-- Table `beltoise`.`platrerie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltoise`.`platrerie` (
  `id` VARCHAR(250) NOT NULL,
  `image` VARCHAR(250) NULL,
  `text` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'images et descriptions des tuiles';


-- -----------------------------------------------------
-- Table `beltoise`.`restaurenov`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltoise`.`restaurenov` (
  `id` VARCHAR(250) NOT NULL,
  `image_before` VARCHAR(250) NULL,
  `image_after` VARCHAR(250) NULL,
  `text` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'images avant, images apres, description';


-- -----------------------------------------------------
-- Table `beltoise`.`global_images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `beltoise`.`global_images` (
  `id` VARCHAR(250) NOT NULL,
  `image` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'image d\'accueil et logos de certification';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
