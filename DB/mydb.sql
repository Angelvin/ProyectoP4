SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`departamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`departamento` (
  `iddepartamento` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombreDepa` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`iddepartamento`) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`detalleticket`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`detalleticket` (
  `iddetalleTicket` INT(11) NOT NULL AUTO_INCREMENT ,
  `descripcio` VARCHAR(45) NULL DEFAULT NULL ,
  `descripciondetallada` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`iddetalleTicket`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`estadoticket`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`estadoticket` (
  `idestadoTicket` INT(11) NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idestadoTicket`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`rol`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`rol` (
  `idrol` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idrol`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`login`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`login` (
  `idlogin` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuario` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `rol_idrol` INT(11) NOT NULL ,
  PRIMARY KEY (`idlogin`, `rol_idrol`) ,
  INDEX `fk_login_rol_idx` (`rol_idrol` ASC) ,
  CONSTRAINT `fk_login_rol`
    FOREIGN KEY (`rol_idrol` )
    REFERENCES `mydb`.`rol` (`idrol` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`persona`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`persona` (
  `idpersona` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `Snombre` VARCHAR(45) NULL DEFAULT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `Sapellido` VARCHAR(45) NULL DEFAULT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `documento` VARCHAR(45) NULL DEFAULT NULL ,
  `login_idlogin` INT(11) NOT NULL ,
  `departamento_iddepartamento` INT(11) NOT NULL ,
  PRIMARY KEY (`idpersona`, `login_idlogin`, `departamento_iddepartamento`) ,
  INDEX `fk_persona_departamento1_idx` (`departamento_iddepartamento` ASC) ,
  INDEX `fk_persona_login1_idx` (`login_idlogin` ASC) ,
  CONSTRAINT `fk_persona_departamento1`
    FOREIGN KEY (`departamento_iddepartamento` )
    REFERENCES `mydb`.`departamento` (`iddepartamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_login1`
    FOREIGN KEY (`login_idlogin` )
    REFERENCES `mydb`.`login` (`idlogin` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`priorida`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`priorida` (
  `idpriorida` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombreprio` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idpriorida`) )
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`problema`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`problema` (
  `idproblema` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombreProblema` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idproblema`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`ticket`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`ticket` (
  `idticket` INT(11) NOT NULL AUTO_INCREMENT ,
  `fechaCreacion` DATE NOT NULL ,
  `ticketcol` VARCHAR(45) NULL DEFAULT NULL ,
  `problema_idproblema` INT(11) NOT NULL ,
  `detalleTicket_iddetalleTicket` INT(11) NOT NULL ,
  `persona_idpersona` INT(11) NOT NULL ,
  `estadoTicket_idestadoTicket` INT(11) NOT NULL ,
  `priorida_idpriorida` INT(11) NOT NULL ,
  `idempleado` INT(11) NULL DEFAULT NULL ,
  `estado` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`idticket`, `problema_idproblema`, `detalleTicket_iddetalleTicket`, `persona_idpersona`, `estadoTicket_idestadoTicket`, `priorida_idpriorida`) ,
  INDEX `fk_ticket_problema1_idx` (`problema_idproblema` ASC) ,
  INDEX `fk_ticket_detalleTicket1_idx` (`detalleTicket_iddetalleTicket` ASC) ,
  INDEX `fk_ticket_persona1_idx` (`persona_idpersona` ASC) ,
  INDEX `fk_ticket_estadoTicket1_idx` (`estadoTicket_idestadoTicket` ASC) ,
  INDEX `fk_ticket_priorida1_idx` (`priorida_idpriorida` ASC) ,
  INDEX `fk_ticket_persona2_idx` (`idempleado` ASC) ,
  CONSTRAINT `fk_ticket_detalleTicket1`
    FOREIGN KEY (`detalleTicket_iddetalleTicket` )
    REFERENCES `mydb`.`detalleticket` (`iddetalleTicket` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_estadoTicket1`
    FOREIGN KEY (`estadoTicket_idestadoTicket` )
    REFERENCES `mydb`.`estadoticket` (`idestadoTicket` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_persona1`
    FOREIGN KEY (`persona_idpersona` )
    REFERENCES `mydb`.`persona` (`idpersona` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_persona2`
    FOREIGN KEY (`idempleado` )
    REFERENCES `mydb`.`persona` (`idpersona` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_priorida1`
    FOREIGN KEY (`priorida_idpriorida` )
    REFERENCES `mydb`.`priorida` (`idpriorida` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_problema1`
    FOREIGN KEY (`problema_idproblema` )
    REFERENCES `mydb`.`problema` (`idproblema` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
