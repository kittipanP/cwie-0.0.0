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
CREATE SCHEMA IF NOT EXISTS `urr_db` DEFAULT CHARACTER SET utf8 ;
USE `urr_db` ;

-- -----------------------------------------------------
-- Table `urr_db`.`bnames`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`bnames` (
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
  `type` VARCHAR(45) NULL,
  `name` VARCHAR(50) NOT NULL,
  `details` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`countries` (
  `countryID` INT NOT NULL AUTO_INCREMENT,
  `countryName` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`countryID`),
  UNIQUE INDEX `countryName_UNIQUE` (`countryName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`universities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`universities` (
  `uniID` INT NOT NULL AUTO_INCREMENT,
  `uniName` VARCHAR(100) NOT NULL,
  `country_countryID` INT NOT NULL,
  PRIMARY KEY (`uniID`),
  UNIQUE INDEX `uniName_UNIQUE` (`uniName` ASC),
  INDEX `fk_universities_country1_idx` (`country_countryID` ASC),
  CONSTRAINT `fk_universities_country1`
    FOREIGN KEY (`country_countryID`)
    REFERENCES `urr_db`.`countries` (`countryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`institutes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`institutes` (
  `instituteID` INT NOT NULL AUTO_INCREMENT,
  `university_uniID` INT NOT NULL,
  `instituteName` VARCHAR(100) NOT NULL,
  `university_uniID1` INT NOT NULL,
  PRIMARY KEY (`instituteID`, `university_uniID`),
  UNIQUE INDEX `instituteName_UNIQUE` (`instituteName` ASC),
  INDEX `fk_institutes_university1_idx` (`university_uniID1` ASC),
  CONSTRAINT `fk_institutes_university1`
    FOREIGN KEY (`university_uniID1`)
    REFERENCES `urr_db`.`universities` (`uniID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`schools`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`schools` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `institutes_instituteID` INT NOT NULL,
  `institutes_university_uniID` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_schools_institutes1_idx` (`institutes_instituteID` ASC, `institutes_university_uniID` ASC),
  CONSTRAINT `fk_schools_institutes1`
    FOREIGN KEY (`institutes_instituteID` , `institutes_university_uniID`)
    REFERENCES `urr_db`.`institutes` (`instituteID` , `university_uniID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`plants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`plants` (
  `plantID` INT NOT NULL AUTO_INCREMENT,
  `plantName` VARCHAR(100) NOT NULL,
  `plantAddress` VARCHAR(255) NULL,
  `countries_countryID` INT NOT NULL,
  PRIMARY KEY (`plantID`, `countries_countryID`),
  UNIQUE INDEX `branchName_UNIQUE` (`plantName` ASC),
  INDEX `fk_plant_countries1_idx` (`countries_countryID` ASC),
  CONSTRAINT `fk_plant_countries1`
    FOREIGN KEY (`countries_countryID`)
    REFERENCES `urr_db`.`countries` (`countryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`departments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`departments` (
  `departmentID` INT NOT NULL AUTO_INCREMENT,
  `departmentName` VARCHAR(100) NOT NULL,
  `Building_buildingID` INT NOT NULL,
  PRIMARY KEY (`departmentID`, `Building_buildingID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`Buildings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`Buildings` (
  `buildingID` INT NOT NULL AUTO_INCREMENT,
  `buildingName` VARCHAR(45) NOT NULL,
  `plants_plantID` INT NOT NULL,
  `plants_countries_countryID` INT NOT NULL,
  PRIMARY KEY (`buildingID`, `plants_plantID`, `plants_countries_countryID`),
  INDEX `fk_Buildings_plants1_idx` (`plants_plantID` ASC, `plants_countries_countryID` ASC),
  CONSTRAINT `fk_Buildings_plants1`
    FOREIGN KEY (`plants_plantID` , `plants_countries_countryID`)
    REFERENCES `urr_db`.`plants` (`plantID` , `countries_countryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`studentStatuses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`studentStatuses` (
  `statusID` INT NOT NULL AUTO_INCREMENT,
  `statusName` VARCHAR(45) NOT NULL COMMENT 'Waiting On Board, \nTrainee,\nEnd Trainee	\n',
  PRIMARY KEY (`statusID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`branches`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`branches` (
  `branchID` INT NOT NULL AUTO_INCREMENT,
  `branchName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`branchID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`bank_ACs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`bank_ACs` (
  `bankID` INT NOT NULL AUTO_INCREMENT,
  `acNumber` INT NOT NULL,
  `branch_branchID` INT NOT NULL,
  PRIMARY KEY (`bankID`, `branch_branchID`),
  INDEX `fk_bank_AC_branch1_idx` (`branch_branchID` ASC),
  CONSTRAINT `fk_bank_AC_branch1`
    FOREIGN KEY (`branch_branchID`)
    REFERENCES `urr_db`.`branches` (`branchID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`resumes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`resumes` (
  `resumeID` INT NOT NULL AUTO_INCREMENT,
  `resumeName` VARCHAR(45) NULL,
  PRIMARY KEY (`resumeID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`transcripts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`transcripts` (
  `transcriptID` INT NOT NULL AUTO_INCREMENT,
  `transcriptName` VARCHAR(45) NULL,
  PRIMARY KEY (`transcriptID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`videos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`videos` (
  `videoID` INT NOT NULL AUTO_INCREMENT,
  `videoName` VARCHAR(45) NULL,
  PRIMARY KEY (`videoID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`years`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`years` (
  `yID` INT NOT NULL,
  `yName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`yID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`locations` (
  `locationID` INT NOT NULL AUTO_INCREMENT,
  `locationName` VARCHAR(45) NOT NULL,
  `locationDetail` TEXT NULL,
  PRIMARY KEY (`locationID`),
  UNIQUE INDEX `locationName_UNIQUE` (`locationName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`transportations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`transportations` (
  `transportationID` INT NOT NULL AUTO_INCREMENT,
  `transportationName` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`transportationID`),
  UNIQUE INDEX `transportationID_UNIQUE` (`transportationID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`students` (
  `sNo` INT NOT NULL AUTO_INCREMENT,
  `sID` INT NOT NULL,
  `bname_bID` INT NOT NULL,
  `charTest_id` INT NOT NULL,
  `school_id` INT NOT NULL,
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
  `sIDCard` INT NULL,
  `sTraineeCode` VARCHAR(20) NULL,
  `sKeyCard` INT NULL,
  `sDateofBrith` DATETIME NULL,
  `plant_plantID` INT NOT NULL,
  `department_departmentID` INT NOT NULL,
  `department_Building_buildingID` INT NOT NULL,
  `Building_buildingID` INT NOT NULL,
  `institutes_instituteID` INT NOT NULL,
  `institutes_university_uniID` INT NOT NULL,
  `universities_uniID` INT NOT NULL,
  `studentStatuses_statusID` INT NOT NULL,
  `bank_AC_bankID` INT NOT NULL,
  `bank_AC_branch_branchID` INT NOT NULL,
  `resumes_resumeID` INT NOT NULL,
  `transcripts_transcriptID` INT NOT NULL,
  `videos_videoID` INT NOT NULL,
  `years_yID` INT NOT NULL,
  `locations_locationID` INT NOT NULL,
  `transportations_transportationID` INT NOT NULL,
  PRIMARY KEY (`sNo`, `sID`, `charTest_id`, `degree_degreeID`, `sIDCard`, `bank_AC_bankID`, `bank_AC_branch_branchID`, `resumes_resumeID`, `transcripts_transcriptID`, `videos_videoID`, `sTraineeCode`),
  INDEX `fk_students_bname_idx` (`bname_bID` ASC),
  INDEX `fk_students_charTest1_idx` (`charTest_id` ASC),
  INDEX `fk_students_school1_idx` (`school_id` ASC),
  INDEX `fk_students_country1_idx` (`country_countryID` ASC),
  UNIQUE INDEX `sTraineeCode_UNIQUE` (`sIDCard` ASC),
  INDEX `fk_student_plant1_idx` (`plant_plantID` ASC),
  INDEX `fk_student_department1_idx` (`department_departmentID` ASC, `department_Building_buildingID` ASC),
  INDEX `fk_student_Building1_idx` (`Building_buildingID` ASC),
  INDEX `fk_students_institutes1_idx` (`institutes_instituteID` ASC, `institutes_university_uniID` ASC),
  INDEX `fk_students_universities1_idx` (`universities_uniID` ASC),
  INDEX `fk_students_studentStatuses1_idx` (`studentStatuses_statusID` ASC),
  INDEX `fk_students_bank_AC1_idx` (`bank_AC_bankID` ASC, `bank_AC_branch_branchID` ASC),
  INDEX `fk_students_resumes1_idx` (`resumes_resumeID` ASC),
  INDEX `fk_students_transcripts1_idx` (`transcripts_transcriptID` ASC),
  INDEX `fk_students_videos1_idx` (`videos_videoID` ASC),
  INDEX `fk_students_Years1_idx` (`years_yID` ASC),
  INDEX `fk_students_locations1_idx` (`locations_locationID` ASC),
  INDEX `fk_students_transportations1_idx` (`transportations_transportationID` ASC),
  UNIQUE INDEX `sTraineeCode_UNIQUE` (`sTraineeCode` ASC),
  UNIQUE INDEX `sKeyCard_UNIQUE` (`sKeyCard` ASC),
  CONSTRAINT `fk_students_bname`
    FOREIGN KEY (`bname_bID`)
    REFERENCES `urr_db`.`bnames` (`bID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_charTest1`
    FOREIGN KEY (`charTest_id`)
    REFERENCES `urr_db`.`charTests` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_school1`
    FOREIGN KEY (`school_id`)
    REFERENCES `urr_db`.`schools` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_country1`
    FOREIGN KEY (`country_countryID`)
    REFERENCES `urr_db`.`countries` (`countryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_plant1`
    FOREIGN KEY (`plant_plantID`)
    REFERENCES `urr_db`.`plants` (`plantID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_department1`
    FOREIGN KEY (`department_departmentID` , `department_Building_buildingID`)
    REFERENCES `urr_db`.`departments` (`departmentID` , `Building_buildingID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_Building1`
    FOREIGN KEY (`Building_buildingID`)
    REFERENCES `urr_db`.`Buildings` (`buildingID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_institutes1`
    FOREIGN KEY (`institutes_instituteID` , `institutes_university_uniID`)
    REFERENCES `urr_db`.`institutes` (`instituteID` , `university_uniID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_universities1`
    FOREIGN KEY (`universities_uniID`)
    REFERENCES `urr_db`.`universities` (`uniID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_studentStatuses1`
    FOREIGN KEY (`studentStatuses_statusID`)
    REFERENCES `urr_db`.`studentStatuses` (`statusID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_bank_AC1`
    FOREIGN KEY (`bank_AC_bankID` , `bank_AC_branch_branchID`)
    REFERENCES `urr_db`.`bank_ACs` (`bankID` , `branch_branchID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_resumes1`
    FOREIGN KEY (`resumes_resumeID`)
    REFERENCES `urr_db`.`resumes` (`resumeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_transcripts1`
    FOREIGN KEY (`transcripts_transcriptID`)
    REFERENCES `urr_db`.`transcripts` (`transcriptID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_videos1`
    FOREIGN KEY (`videos_videoID`)
    REFERENCES `urr_db`.`videos` (`videoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_Years1`
    FOREIGN KEY (`years_yID`)
    REFERENCES `urr_db`.`years` (`yID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_locations1`
    FOREIGN KEY (`locations_locationID`)
    REFERENCES `urr_db`.`locations` (`locationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_transportations1`
    FOREIGN KEY (`transportations_transportationID`)
    REFERENCES `urr_db`.`transportations` (`transportationID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`degrees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`degrees` (
  `degreeID` INT NOT NULL AUTO_INCREMENT,
  `degreename` VARCHAR(100) NOT NULL COMMENT 'Diploma\nB\nM\nD',
  PRIMARY KEY (`degreeID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`supervisors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`supervisors` (
  `supID` INT NOT NULL,
  `supFirstName` VARCHAR(45) NOT NULL,
  `supLastName` VARCHAR(45) NOT NULL,
  `supTel` INT NULL,
  `supOffice` INT NULL,
  `supEmail` VARCHAR(45) NULL,
  `supPosition` VARCHAR(100) NULL,
  PRIMARY KEY (`supID`),
  UNIQUE INDEX `supEmail_UNIQUE` (`supEmail` ASC))
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
    REFERENCES `urr_db`.`students` (`sNo` , `sID` , `charTest_id` , `degree_degreeID` , `sIDCard`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_supervisor_supervisor1`
    FOREIGN KEY (`supervisor_supID`)
    REFERENCES `urr_db`.`supervisors` (`supID`)
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
    REFERENCES `urr_db`.`supervisors` (`supID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_supervisor_has_department_department1`
    FOREIGN KEY (`department_departmentID`)
    REFERENCES `urr_db`.`departments` (`departmentID`)
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
    REFERENCES `urr_db`.`students` (`sNo` , `sID` , `charTest_id` , `degree_degreeID` , `sIDCard`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_department_department1`
    FOREIGN KEY (`department_departmentID`)
    REFERENCES `urr_db`.`departments` (`departmentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`projects` (
  `projectID` INT NOT NULL AUTO_INCREMENT,
  `projectName` VARCHAR(200) NOT NULL,
  `projectDetails` TEXT NULL,
  PRIMARY KEY (`projectID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`trainingCourses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`trainingCourses` (
  `courseID` INT NOT NULL AUTO_INCREMENT,
  `courseName` VARCHAR(200) NOT NULL,
  `courseDetails` TEXT NULL,
  PRIMARY KEY (`courseID`),
  UNIQUE INDEX `courseName_UNIQUE` (`courseName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`students_has_projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`students_has_projects` (
  `students_sNo` INT NOT NULL,
  `students_sID` INT NOT NULL,
  `students_charTest_id` INT NOT NULL,
  `students_degree_degreeID` INT NOT NULL,
  `students_sTraineeCode` VARCHAR(10) NOT NULL,
  `students_bank_AC_bankID` INT NOT NULL,
  `students_bank_AC_branch_branchID` INT NOT NULL,
  `students_resumes_resumeID` INT NOT NULL,
  `students_transcripts_transcriptID` INT NOT NULL,
  `students_videos_videoID` INT NOT NULL,
  `projects_projectID` INT NOT NULL,
  PRIMARY KEY (`students_sNo`, `students_sID`, `students_charTest_id`, `students_degree_degreeID`, `students_sTraineeCode`, `students_bank_AC_bankID`, `students_bank_AC_branch_branchID`, `students_resumes_resumeID`, `students_transcripts_transcriptID`, `students_videos_videoID`, `projects_projectID`),
  INDEX `fk_students_has_projects_projects1_idx` (`projects_projectID` ASC),
  INDEX `fk_students_has_projects_students1_idx` (`students_sNo` ASC, `students_sID` ASC, `students_charTest_id` ASC, `students_degree_degreeID` ASC, `students_sTraineeCode` ASC, `students_bank_AC_bankID` ASC, `students_bank_AC_branch_branchID` ASC, `students_resumes_resumeID` ASC, `students_transcripts_transcriptID` ASC, `students_videos_videoID` ASC),
  CONSTRAINT `fk_students_has_projects_students1`
    FOREIGN KEY (`students_sNo` , `students_sID` , `students_charTest_id` , `students_degree_degreeID` , `students_sTraineeCode` , `students_bank_AC_bankID` , `students_bank_AC_branch_branchID` , `students_resumes_resumeID` , `students_transcripts_transcriptID` , `students_videos_videoID`)
    REFERENCES `urr_db`.`students` (`sNo` , `sID` , `charTest_id` , `degree_degreeID` , `sIDCard` , `bank_AC_bankID` , `bank_AC_branch_branchID` , `resumes_resumeID` , `transcripts_transcriptID` , `videos_videoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_has_projects_projects1`
    FOREIGN KEY (`projects_projectID`)
    REFERENCES `urr_db`.`projects` (`projectID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_db`.`students_has_trainingCourses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_db`.`students_has_trainingCourses` (
  `students_sNo` INT NOT NULL,
  `students_sID` INT NOT NULL,
  `students_charTest_id` INT NOT NULL,
  `students_degree_degreeID` INT NOT NULL,
  `students_sTraineeCode` VARCHAR(10) NOT NULL,
  `students_bank_AC_bankID` INT NOT NULL,
  `students_bank_AC_branch_branchID` INT NOT NULL,
  `students_resumes_resumeID` INT NOT NULL,
  `students_transcripts_transcriptID` INT NOT NULL,
  `students_videos_videoID` INT NOT NULL,
  `trainingCourses_courseID` INT NOT NULL,
  PRIMARY KEY (`students_sNo`, `students_sID`, `students_charTest_id`, `students_degree_degreeID`, `students_sTraineeCode`, `students_bank_AC_bankID`, `students_bank_AC_branch_branchID`, `students_resumes_resumeID`, `students_transcripts_transcriptID`, `students_videos_videoID`, `trainingCourses_courseID`),
  INDEX `fk_students_has_trainingCourses_trainingCourses1_idx` (`trainingCourses_courseID` ASC),
  INDEX `fk_students_has_trainingCourses_students1_idx` (`students_sNo` ASC, `students_sID` ASC, `students_charTest_id` ASC, `students_degree_degreeID` ASC, `students_sTraineeCode` ASC, `students_bank_AC_bankID` ASC, `students_bank_AC_branch_branchID` ASC, `students_resumes_resumeID` ASC, `students_transcripts_transcriptID` ASC, `students_videos_videoID` ASC),
  CONSTRAINT `fk_students_has_trainingCourses_students1`
    FOREIGN KEY (`students_sNo` , `students_sID` , `students_charTest_id` , `students_degree_degreeID` , `students_sTraineeCode` , `students_bank_AC_bankID` , `students_bank_AC_branch_branchID` , `students_resumes_resumeID` , `students_transcripts_transcriptID` , `students_videos_videoID`)
    REFERENCES `urr_db`.`students` (`sNo` , `sID` , `charTest_id` , `degree_degreeID` , `sIDCard` , `bank_AC_bankID` , `bank_AC_branch_branchID` , `resumes_resumeID` , `transcripts_transcriptID` , `videos_videoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_has_trainingCourses_trainingCourses1`
    FOREIGN KEY (`trainingCourses_courseID`)
    REFERENCES `urr_db`.`trainingCourses` (`courseID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
