-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema urr_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema urr_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `urr_db` DEFAULT CHARACTER SET ucs2 ;
USE `urr_db` ;

-- -----------------------------------------------------
-- Table `urr_db`.`bname`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`bname` (
  `bID` INT NOT NULL AUTO_INCREMENT,
  `bName` VARCHAR(6) NOT NULL COMMENT 'title; Mr., Ms.',
  `bSex` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`bID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`charTests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`charTests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `details` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`country` (
  `countryID` INT NOT NULL AUTO_INCREMENT,
  `countryName` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`countryID`),
  UNIQUE INDEX `countryName_UNIQUE` (`countryName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`university`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`university` (
  `uniID` INT NOT NULL AUTO_INCREMENT,
  `uniName` VARCHAR(100) NOT NULL,
  `country_countryID` INT NOT NULL,
  PRIMARY KEY (`uniID`),
  UNIQUE INDEX `uniName_UNIQUE` (`uniName` ASC),
  INDEX `fk_universities_country1_idx` (`country_countryID` ASC),
  CONSTRAINT `fk_universities_country1`
    FOREIGN KEY (`country_countryID`)
    REFERENCES `urr_db`.`country` (`countryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`institute`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`institute` (
  `instituteID` INT NOT NULL AUTO_INCREMENT,
  `university_uniID` INT NOT NULL,
  `instituteName` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`instituteID`, `university_uniID`),
  UNIQUE INDEX `instituteName_UNIQUE` (`instituteName` ASC),
  INDEX `fk_institute_university1_idx` (`university_uniID` ASC),
  CONSTRAINT `fk_institute_university1`
    FOREIGN KEY (`university_uniID`)
    REFERENCES `urr_db`.`university` (`uniID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`school`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`school` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `institute_instituteID` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`, `institute_instituteID`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_school_institute1_idx` (`institute_instituteID` ASC),
  CONSTRAINT `fk_school_institute1`
    FOREIGN KEY (`institute_instituteID`)
    REFERENCES `urr_db`.`institute` (`instituteID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`degree`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`degree` (
  `degreeID` INT NOT NULL AUTO_INCREMENT,
  `degreename` VARCHAR(100) NOT NULL COMMENT 'Diploma\nB\nM\nD',
  PRIMARY KEY (`degreeID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`plant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`plant` (
  `plantID` INT NOT NULL AUTO_INCREMENT,
  `plantName` VARCHAR(100) NOT NULL,
  `plantAddress` VARCHAR(255) NULL,
  PRIMARY KEY (`plantID`),
  UNIQUE INDEX `branchName_UNIQUE` (`plantName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`Building`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`Building` (
  `buildingID` INT NOT NULL AUTO_INCREMENT,
  `buildingName` VARCHAR(45) NOT NULL,
  `plant_plantID` INT NOT NULL,
  PRIMARY KEY (`buildingID`),
  INDEX `fk_Building_plant1_idx` (`plant_plantID` ASC),
  CONSTRAINT `fk_Building_plant1`
    FOREIGN KEY (`plant_plantID`)
    REFERENCES `urr_db`.`plant` (`plantID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`department` (
  `departmentID` INT NOT NULL AUTO_INCREMENT,
  `departmentName` VARCHAR(100) NOT NULL,
  `Building_buildingID` INT NOT NULL,
  PRIMARY KEY (`departmentID`, `Building_buildingID`),
  INDEX `fk_department_Building1_idx` (`Building_buildingID` ASC),
  CONSTRAINT `fk_department_Building1`
    FOREIGN KEY (`Building_buildingID`)
    REFERENCES `urr_db`.`Building` (`buildingID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`student` (
  `sNo` INT NOT NULL AUTO_INCREMENT,
  `sID` INT NOT NULL,
  `bname_bID` INT NOT NULL,
  `charTest_id` INT NOT NULL,
  `school_id` INT NOT NULL,
  `institute_instituteID` INT NOT NULL,
  `university_uniID` INT NOT NULL,
  `country_countryID` INT NOT NULL,
  `degree_degreeID` INT NOT NULL,
  `engFirstName` VARCHAR(100) NOT NULL,
  `engMiddleName` VARCHAR(100) NULL,
  `engLastName` VARCHAR(100) NOT NULL,
  `thFirstName` VARCHAR(100) NOT NULL,
  `thLastName` VARCHAR(100) NOT NULL,
  `startDate` DATETIME NULL,
  `endDate` DATETIME NULL,
  `created` DATETIME NULL,
  `engTest` INT NULL,
  `engCommu` INT NULL,
  `sTel` INT NULL,
  `sEmail` VARCHAR(100) NULL,
  `sRemark` TEXT NULL,
  `sTraineeCode` VARCHAR(10) NULL,
  `sKeyCode` INT NULL,
  `sDateofBrith` DATETIME NULL,
  `location` VARCHAR(100) NULL,
  `sbuilding` VARCHAR(5) NULL,
  `plant_plantID` INT NOT NULL,
  `department_departmentID` INT NOT NULL,
  `department_Building_buildingID` INT NOT NULL,
  `Building_buildingID` INT NOT NULL,
  `department_departmentID1` INT NOT NULL,
  `department_Building_buildingID1` INT NOT NULL,
  `sIdCard` INT NULL,
  PRIMARY KEY (`sNo`, `sID`, `charTest_id`, `degree_degreeID`, `sTraineeCode`),
  INDEX `fk_students_bname_idx` (`bname_bID` ASC),
  INDEX `fk_students_charTest1_idx` (`charTest_id` ASC),
  INDEX `fk_students_school1_idx` (`school_id` ASC),
  INDEX `fk_students_institute1_idx` (`institute_instituteID` ASC),
  INDEX `fk_students_university1_idx` (`university_uniID` ASC),
  INDEX `fk_students_country1_idx` (`country_countryID` ASC),
  INDEX `fk_students_degree1_idx` (`degree_degreeID` ASC),
  UNIQUE INDEX `sTraineeCode_UNIQUE` (`sTraineeCode` ASC),
  INDEX `fk_student_plant1_idx` (`plant_plantID` ASC),
  INDEX `fk_student_department1_idx` (`department_departmentID` ASC, `department_Building_buildingID` ASC),
  INDEX `fk_student_Building1_idx` (`Building_buildingID` ASC),
  INDEX `fk_student_department2_idx` (`department_departmentID1` ASC, `department_Building_buildingID1` ASC),
  CONSTRAINT `fk_students_bname`
    FOREIGN KEY (`bname_bID`)
    REFERENCES `urr_db`.`bname` (`bID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_charTest1`
    FOREIGN KEY (`charTest_id`)
    REFERENCES `urr_db`.`charTests` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_school1`
    FOREIGN KEY (`school_id`)
    REFERENCES `urr_db`.`school` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_institute1`
    FOREIGN KEY (`institute_instituteID`)
    REFERENCES `urr_db`.`institute` (`instituteID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_university1`
    FOREIGN KEY (`university_uniID`)
    REFERENCES `urr_db`.`university` (`uniID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_country1`
    FOREIGN KEY (`country_countryID`)
    REFERENCES `urr_db`.`country` (`countryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_degree1`
    FOREIGN KEY (`degree_degreeID`)
    REFERENCES `urr_db`.`degree` (`degreeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_plant1`
    FOREIGN KEY (`plant_plantID`)
    REFERENCES `urr_db`.`plant` (`plantID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_department1`
    FOREIGN KEY (`department_departmentID` , `department_Building_buildingID`)
    REFERENCES `urr_db`.`department` (`departmentID` , `Building_buildingID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_Building1`
    FOREIGN KEY (`Building_buildingID`)
    REFERENCES `urr_db`.`Building` (`buildingID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_department2`
    FOREIGN KEY (`department_departmentID1` , `department_Building_buildingID1`)
    REFERENCES `urr_db`.`department` (`departmentID` , `Building_buildingID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`resume`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`resume` (
  `resume` INT NOT NULL AUTO_INCREMENT,
  `resumeName` VARCHAR(45) NOT NULL,
  `student_sNo` INT NOT NULL,
  `student_sID` INT NOT NULL,
  `student_charTest_id` INT NOT NULL,
  `student_degree_degreeID` INT NOT NULL,
  PRIMARY KEY (`resume`, `student_sNo`, `student_sID`, `student_charTest_id`, `student_degree_degreeID`),
  INDEX `fk_resume_student1_idx` (`student_sNo` ASC, `student_sID` ASC, `student_charTest_id` ASC, `student_degree_degreeID` ASC),
  CONSTRAINT `fk_resume_student1`
    FOREIGN KEY (`student_sNo` , `student_sID` , `student_charTest_id` , `student_degree_degreeID`)
    REFERENCES `urr_db`.`student` (`sNo` , `sID` , `charTest_id` , `degree_degreeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`transcripts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`transcripts` (
  `transcriptsID` INT NOT NULL AUTO_INCREMENT,
  `transcriptName` VARCHAR(45) NOT NULL,
  `student_sNo` INT NOT NULL,
  `student_sID` INT NOT NULL,
  `student_charTest_id` INT NOT NULL,
  `student_degree_degreeID` INT NOT NULL,
  PRIMARY KEY (`transcriptsID`, `student_sNo`, `student_sID`, `student_charTest_id`, `student_degree_degreeID`),
  INDEX `fk_transcripts_student1_idx` (`student_sNo` ASC, `student_sID` ASC, `student_charTest_id` ASC, `student_degree_degreeID` ASC),
  CONSTRAINT `fk_transcripts_student1`
    FOREIGN KEY (`student_sNo` , `student_sID` , `student_charTest_id` , `student_degree_degreeID`)
    REFERENCES `urr_db`.`student` (`sNo` , `sID` , `charTest_id` , `degree_degreeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`video` (
  `videoID` INT NOT NULL AUTO_INCREMENT,
  `videoName` VARCHAR(45) NULL,
  `student_sNo` INT NOT NULL,
  `student_sID` INT NOT NULL,
  `student_charTest_id` INT NOT NULL,
  `student_degree_degreeID` INT NOT NULL,
  PRIMARY KEY (`videoID`, `student_sNo`, `student_sID`, `student_charTest_id`, `student_degree_degreeID`),
  INDEX `fk_video_student1_idx` (`student_sNo` ASC, `student_sID` ASC, `student_charTest_id` ASC, `student_degree_degreeID` ASC),
  CONSTRAINT `fk_video_student1`
    FOREIGN KEY (`student_sNo` , `student_sID` , `student_charTest_id` , `student_degree_degreeID`)
    REFERENCES `urr_db`.`student` (`sNo` , `sID` , `charTest_id` , `degree_degreeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`studentStatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`studentStatus` (
  `statusID` INT NOT NULL AUTO_INCREMENT,
  `statusName` VARCHAR(45) NOT NULL COMMENT 'Waiting On Board, \nTrainee,\nEnd Trainee	\n',
  `students_sNo` INT NOT NULL,
  `students_sID` INT NOT NULL,
  `students_charTest_id` INT NOT NULL,
  `students_degree_degreeID` INT NOT NULL,
  PRIMARY KEY (`statusID`, `students_sNo`, `students_sID`, `students_charTest_id`, `students_degree_degreeID`),
  INDEX `fk_studentStatus_students1_idx` (`students_sNo` ASC, `students_sID` ASC, `students_charTest_id` ASC, `students_degree_degreeID` ASC),
  CONSTRAINT `fk_studentStatus_students1`
    FOREIGN KEY (`students_sNo` , `students_sID` , `students_charTest_id` , `students_degree_degreeID`)
    REFERENCES `urr_db`.`student` (`sNo` , `sID` , `charTest_id` , `degree_degreeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`supervisor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`supervisor` (
  `supID` INT NOT NULL,
  `supFirstName` VARCHAR(45) NOT NULL,
  `supLastName` VARCHAR(45) NOT NULL,
  `supTel` INT NULL,
  `supOffice` INT NULL,
  `supEmail` VARCHAR(45) NULL,
  `supPosition` VARCHAR(100) NULL,
  PRIMARY KEY (`supID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`student_has_supervisor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`student_has_supervisor` (
  `student_sNo` INT NOT NULL,
  `student_sID` INT NOT NULL,
  `student_charTest_id` INT NOT NULL,
  `student_degree_degreeID` INT NOT NULL,
  `student_sTraineeCode` VARCHAR(10) NOT NULL,
  `supervisor_supID` INT NOT NULL,
  PRIMARY KEY (`student_sNo`, `student_sID`, `student_charTest_id`, `student_degree_degreeID`, `student_sTraineeCode`, `supervisor_supID`),
  INDEX `fk_student_has_supervisor_supervisor1_idx` (`supervisor_supID` ASC),
  INDEX `fk_student_has_supervisor_student1_idx` (`student_sNo` ASC, `student_sID` ASC, `student_charTest_id` ASC, `student_degree_degreeID` ASC, `student_sTraineeCode` ASC),
  CONSTRAINT `fk_student_has_supervisor_student1`
    FOREIGN KEY (`student_sNo` , `student_sID` , `student_charTest_id` , `student_degree_degreeID` , `student_sTraineeCode`)
    REFERENCES `urr_db`.`student` (`sNo` , `sID` , `charTest_id` , `degree_degreeID` , `sTraineeCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_supervisor_supervisor1`
    FOREIGN KEY (`supervisor_supID`)
    REFERENCES `urr_db`.`supervisor` (`supID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`supervisor_has_department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`supervisor_has_department` (
  `supervisor_supID` INT NOT NULL,
  `department_departmentID` INT NOT NULL,
  PRIMARY KEY (`supervisor_supID`, `department_departmentID`),
  INDEX `fk_supervisor_has_department_department1_idx` (`department_departmentID` ASC),
  INDEX `fk_supervisor_has_department_supervisor1_idx` (`supervisor_supID` ASC),
  CONSTRAINT `fk_supervisor_has_department_supervisor1`
    FOREIGN KEY (`supervisor_supID`)
    REFERENCES `urr_db`.`supervisor` (`supID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_supervisor_has_department_department1`
    FOREIGN KEY (`department_departmentID`)
    REFERENCES `urr_db`.`department` (`departmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`student_has_department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`student_has_department` (
  `student_sNo` INT NOT NULL,
  `student_sID` INT NOT NULL,
  `student_charTest_id` INT NOT NULL,
  `student_degree_degreeID` INT NOT NULL,
  `student_sTraineeCode` VARCHAR(10) NOT NULL,
  `department_departmentID` INT NOT NULL,
  PRIMARY KEY (`student_sNo`, `student_sID`, `student_charTest_id`, `student_degree_degreeID`, `student_sTraineeCode`, `department_departmentID`),
  INDEX `fk_student_has_department_department1_idx` (`department_departmentID` ASC),
  INDEX `fk_student_has_department_student1_idx` (`student_sNo` ASC, `student_sID` ASC, `student_charTest_id` ASC, `student_degree_degreeID` ASC, `student_sTraineeCode` ASC),
  CONSTRAINT `fk_student_has_department_student1`
    FOREIGN KEY (`student_sNo` , `student_sID` , `student_charTest_id` , `student_degree_degreeID` , `student_sTraineeCode`)
    REFERENCES `urr_db`.`student` (`sNo` , `sID` , `charTest_id` , `degree_degreeID` , `sTraineeCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_department_department1`
    FOREIGN KEY (`department_departmentID`)
    REFERENCES `urr_db`.`department` (`departmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`branch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`branch` (
  `branchID` INT NOT NULL AUTO_INCREMENT,
  `branchName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`branchID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`bank_AC`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`bank_AC` (
  `bankID` INT NOT NULL AUTO_INCREMENT,
  `acNumber` INT NOT NULL,
  `student_sNo` INT NOT NULL,
  `student_sID` INT NOT NULL,
  `student_charTest_id` INT NOT NULL,
  `student_degree_degreeID` INT NOT NULL,
  `student_sTraineeCode` VARCHAR(10) NOT NULL,
  `branch_branchID` INT NOT NULL,
  PRIMARY KEY (`bankID`, `student_sNo`, `student_sID`, `student_charTest_id`, `student_degree_degreeID`, `student_sTraineeCode`, `branch_branchID`),
  INDEX `fk_bank_AC_student1_idx` (`student_sNo` ASC, `student_sID` ASC, `student_charTest_id` ASC, `student_degree_degreeID` ASC, `student_sTraineeCode` ASC),
  INDEX `fk_bank_AC_branch1_idx` (`branch_branchID` ASC),
  CONSTRAINT `fk_bank_AC_student1`
    FOREIGN KEY (`student_sNo` , `student_sID` , `student_charTest_id` , `student_degree_degreeID` , `student_sTraineeCode`)
    REFERENCES `urr_db`.`student` (`sNo` , `sID` , `charTest_id` , `degree_degreeID` , `sTraineeCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bank_AC_branch1`
    FOREIGN KEY (`branch_branchID`)
    REFERENCES `urr_db`.`branch` (`branchID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
