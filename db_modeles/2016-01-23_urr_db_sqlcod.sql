-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema 2016-01-23_urr_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema 2016-01-23_urr_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `2016-01-23_urr_db` DEFAULT CHARACTER SET utf8 ;
USE `2016-01-23_urr_db` ;

-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_type` (
  `type_id` INT NOT NULL AUTO_INCREMENT,
  `type_name` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`type_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_origin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_origin` (
  `origin_id` INT NOT NULL AUTO_INCREMENT,
  `origin_name` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`origin_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_status` (
  `status_id` INT NOT NULL AUTO_INCREMENT,
  `status_desc` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`status_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_reference_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_reference_info` (
  `ref_id` INT NOT NULL AUTO_INCREMENT,
  `ref_fname` VARCHAR(20) NULL,
  `ref_lname` VARCHAR(20) NULL,
  `ref_contact` VARCHAR(12) NULL,
  `ref_email` VARCHAR(100) NULL,
  PRIMARY KEY (`ref_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_info` (
  `s_id` INT NOT NULL AUTO_INCREMENT,
  `s_fname` VARCHAR(20) NOT NULL,
  `s_lname` VARCHAR(20) NOT NULL,
  `thai_fname` VARCHAR(20) NULL,
  `thai_lname` VARCHAR(20) NULL,
  `s_gender` VARCHAR(5) NOT NULL,
  `s_dob` DATE NOT NULL,
  `remark` TEXT NULL,
  `origin_id` INT NULL,
  `type_id` INT NULL,
  `status_id` INT NULL,
  `ref_id` INT NULL,
  PRIMARY KEY (`s_id`),
  INDEX `s_status_id_idx` (`status_id` ASC),
  INDEX `s_type_id_idx` (`type_id` ASC),
  INDEX `s_origin_id_idx` (`origin_id` ASC),
  INDEX `s_ref_id_idx` (`ref_id` ASC),
  CONSTRAINT `status_id`
    FOREIGN KEY (`status_id`)
    REFERENCES `2016-01-23_urr_db`.`student_status` (`status_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `type_id`
    FOREIGN KEY (`type_id`)
    REFERENCES `2016-01-23_urr_db`.`student_type` (`type_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `origin_id`
    FOREIGN KEY (`origin_id`)
    REFERENCES `2016-01-23_urr_db`.`student_origin` (`origin_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ref_id`
    FOREIGN KEY (`ref_id`)
    REFERENCES `2016-01-23_urr_db`.`student_reference_info` (`ref_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`application`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`application` (
  `application_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NULL,
  `application_time` TIME NULL,
  `application_date` DATE NULL,
  `application_status` VARCHAR(45) NULL,
  PRIMARY KEY (`application_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`resume`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`resume` (
  `resume_id` INT NOT NULL AUTO_INCREMENT,
  `resume_name` VARCHAR(50) NOT NULL,
  `application_id` INT NULL,
  PRIMARY KEY (`resume_id`),
  INDEX `appilication_id_idx` (`application_id` ASC),
  CONSTRAINT `appilication_id`
    FOREIGN KEY (`application_id`)
    REFERENCES `2016-01-23_urr_db`.`application` (`application_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`video` (
  `video_id` INT NOT NULL AUTO_INCREMENT,
  `video_name` VARCHAR(50) NOT NULL,
  `application_id` INT NULL,
  PRIMARY KEY (`video_id`),
  INDEX `application_id_idx` (`application_id` ASC),
  CONSTRAINT `application_id`
    FOREIGN KEY (`application_id`)
    REFERENCES `2016-01-23_urr_db`.`application` (`application_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`transcript`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`transcript` (
  `transcript_id` INT NOT NULL AUTO_INCREMENT,
  `transcript_name` VARCHAR(50) NOT NULL,
  `application_id` INT NULL,
  PRIMARY KEY (`transcript_id`),
  INDEX `application_id_idx` (`application_id` ASC),
  CONSTRAINT `application_id`
    FOREIGN KEY (`application_id`)
    REFERENCES `2016-01-23_urr_db`.`application` (`application_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`major_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`major_info` (
  `major_id` INT NOT NULL AUTO_INCREMENT,
  `major_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`major_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`degree_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`degree_info` (
  `degree_id` INT NOT NULL AUTO_INCREMENT,
  `degree_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`degree_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`country_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`country_list` (
  `country_id` INT NOT NULL AUTO_INCREMENT,
  `country_name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`country_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`university_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`university_info` (
  `uni_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NOT NULL,
  `uni_name` VARCHAR(100) NOT NULL,
  `major_id` INT NULL,
  `degree_id` INT NULL,
  `gpa` FLOAT NULL,
  `start_year` DATE NULL,
  `end_year` DATE NULL,
  `country_id` INT NULL,
  PRIMARY KEY (`uni_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `major_id_idx` (`major_id` ASC),
  INDEX `degree_id_idx` (`degree_id` ASC),
  INDEX `country_id_idx` (`country_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `major_id`
    FOREIGN KEY (`major_id`)
    REFERENCES `2016-01-23_urr_db`.`major_info` (`major_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `degree_id`
    FOREIGN KEY (`degree_id`)
    REFERENCES `2016-01-23_urr_db`.`degree_info` (`degree_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `country_id`
    FOREIGN KEY (`country_id`)
    REFERENCES `2016-01-23_urr_db`.`country_list` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`institute_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`institute_info` (
  `institute_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NOT NULL,
  `institute_name` VARCHAR(100) NOT NULL,
  `major_id` INT NULL,
  `degree_id` INT NULL,
  `start_year` DATE NULL,
  `end_year` DATE NULL,
  `country_id` INT NULL,
  PRIMARY KEY (`institute_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `major_id_idx` (`major_id` ASC),
  INDEX `degree_id_idx` (`degree_id` ASC),
  INDEX `country_id_idx` (`country_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `major_id`
    FOREIGN KEY (`major_id`)
    REFERENCES `2016-01-23_urr_db`.`major_info` (`major_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `degree_id`
    FOREIGN KEY (`degree_id`)
    REFERENCES `2016-01-23_urr_db`.`degree_info` (`degree_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `country_id`
    FOREIGN KEY (`country_id`)
    REFERENCES `2016-01-23_urr_db`.`country_list` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_emergency_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_emergency_contact` (
  `emc_id` INT NOT NULL AUTO_INCREMENT,
  `emc_fname` VARCHAR(20) NOT NULL,
  `emc_lname` VARCHAR(20) NULL,
  `emc_relation` VARCHAR(50) NULL,
  `emc_contact` VARCHAR(12) NULL,
  PRIMARY KEY (`emc_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_contact_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_contact_details` (
  `contact_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NOT NULL,
  `contact_no` VARCHAR(12) NULL,
  `email_adress` VARCHAR(50) NULL,
  `emc_id` INT NULL,
  PRIMARY KEY (`contact_id`),
  UNIQUE INDEX `s_email_address_UNIQUE` (`email_adress` ASC),
  UNIQUE INDEX `s_contact_no_UNIQUE` (`contact_no` ASC),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `s_emc_id_idx` (`emc_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `s_emc_id`
    FOREIGN KEY (`emc_id`)
    REFERENCES `2016-01-23_urr_db`.`student_emergency_contact` (`emc_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_address` (
  `address_Id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NOT NULL,
  `place_name` VARCHAR(100) NOT NULL,
  `road_name` VARCHAR(100) NULL,
  `sub_district` VARCHAR(100) NULL,
  `district` VARCHAR(100) NULL,
  `city` VARCHAR(100) NOT NULL,
  `zip_code` INT NOT NULL,
  `province_name` VARCHAR(100) NOT NULL,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`address_Id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `country_id_idx` (`country_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `country_id`
    FOREIGN KEY (`country_id`)
    REFERENCES `2016-01-23_urr_db`.`country_list` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_job`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_job` (
  `job_id` INT NOT NULL AUTO_INCREMENT,
  `job_desc` TEXT NOT NULL,
  PRIMARY KEY (`job_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_project` (
  `project_id` INT NOT NULL AUTO_INCREMENT,
  `project_name` VARCHAR(100) NOT NULL,
  `project_detail` TEXT NULL,
  PRIMARY KEY (`project_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`building_id`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`building_id` (
  `bldg_id` INT NOT NULL AUTO_INCREMENT,
  `bldg_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`bldg_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`department_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`department_info` (
  `dep_id` INT NOT NULL AUTO_INCREMENT,
  `dep_name` VARCHAR(100) NOT NULL,
  `dep_ext` INT NULL,
  `bldg_id` INT NULL,
  PRIMARY KEY (`dep_id`),
  INDEX `bldg_id_idx` (`bldg_id` ASC),
  CONSTRAINT `bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `2016-01-23_urr_db`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_presentation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_presentation` (
  `presentation_id` INT NOT NULL AUTO_INCREMENT,
  `presentation_date` DATE NULL,
  `presentation_time` TIME NULL,
  `remark` TEXT NULL,
  `presentation_score` FLOAT NULL,
  `presentaiton_room` VARCHAR(10) NULL,
  `bldg_id` INT NULL,
  PRIMARY KEY (`presentation_id`),
  INDEX `bldg_id_idx` (`bldg_id` ASC),
  CONSTRAINT `bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `2016-01-23_urr_db`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_transportation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_transportation` (
  `transportation_id` INT NOT NULL,
  `driver_fname` VARCHAR(20) NOT NULL,
  `driver_lname` VARCHAR(20) NOT NULL,
  `vehicle_no` VARCHAR(5) NOT NULL,
  `driver_mobile` VARCHAR(12) NOT NULL,
  `destination_name` VARCHAR(50) NULL,
  PRIMARY KEY (`transportation_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`plant_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`plant_info` (
  `plant_id` INT NOT NULL AUTO_INCREMENT,
  `plant_name` VARCHAR(50) NOT NULL,
  `country_id` INT NULL,
  PRIMARY KEY (`plant_id`),
  INDEX `country_id_idx` (`country_id` ASC),
  CONSTRAINT `country_id`
    FOREIGN KEY (`country_id`)
    REFERENCES `2016-01-23_urr_db`.`country_list` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`location` (
  `location_id` INT NOT NULL,
  `location_name` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`location_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_info` (
  `trainee_id` VARCHAR(15) NOT NULL,
  `s_id` INT NOT NULL,
  `job_id` INT NULL,
  `project_id` INT NULL,
  `trainee_presentation_id` INT NULL,
  `dep_id` INT NULL,
  `transportation_id` INT NULL,
  `plant_id` INT NULL,
  `location_id` INT NULL,
  PRIMARY KEY (`trainee_id`),
  UNIQUE INDEX `s_trainee_info_id_UNIQUE` (`trainee_id` ASC),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `s_job_id_idx` (`job_id` ASC),
  INDEX `s_project_id_idx` (`project_id` ASC),
  INDEX `dep_id_idx` (`dep_id` ASC),
  INDEX `s_pres_id_idx` (`trainee_presentation_id` ASC),
  INDEX `s_trps_id_idx` (`transportation_id` ASC),
  INDEX `plant_id_idx` (`plant_id` ASC),
  INDEX `location_id_idx` (`location_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `trainee_job_id`
    FOREIGN KEY (`job_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_job` (`job_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `project_id`
    FOREIGN KEY (`project_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_project` (`project_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `dep_id`
    FOREIGN KEY (`dep_id`)
    REFERENCES `2016-01-23_urr_db`.`department_info` (`dep_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `presentation_id`
    FOREIGN KEY (`trainee_presentation_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_presentation` (`presentation_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `transportation_id`
    FOREIGN KEY (`transportation_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_transportation` (`transportation_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `plant_id`
    FOREIGN KEY (`plant_id`)
    REFERENCES `2016-01-23_urr_db`.`plant_info` (`plant_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `location_id`
    FOREIGN KEY (`location_id`)
    REFERENCES `2016-01-23_urr_db`.`location` (`location_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`immigration_office`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`immigration_office` (
  `img_id` INT NOT NULL AUTO_INCREMENT,
  `img_name` VARCHAR(100) NOT NULL,
  `img_location` TEXT NULL,
  PRIMARY KEY (`img_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_visa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_visa` (
  `visa_id` INT NOT NULL AUTO_INCREMENT,
  `trainee_id` VARCHAR(15) NOT NULL,
  `visa_exp_date` DATE NULL,
  `visa_email_date` DATE NULL,
  `img_id` INT NULL,
  PRIMARY KEY (`visa_id`),
  INDEX `s_tr_id_idx` (`trainee_id` ASC),
  INDEX `img_id_idx` (`img_id` ASC),
  CONSTRAINT `trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `img_id`
    FOREIGN KEY (`img_id`)
    REFERENCES `2016-01-23_urr_db`.`immigration_office` (`img_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`supervisor_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`supervisor_info` (
  `spv_id` INT NOT NULL AUTO_INCREMENT,
  `spv_fname` VARCHAR(20) NOT NULL,
  `spv_lname` VARCHAR(20) NOT NULL,
  `spv_job` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`spv_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`supervisor_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`supervisor_contact` (
  `spv_contact_id` INT NOT NULL AUTO_INCREMENT,
  `spv_id` INT NOT NULL,
  `spv_ext` INT NULL,
  `spv_email` VARCHAR(50) NULL,
  `spv_mobile` VARCHAR(12) NULL,
  `dep_id` INT NULL,
  `bldg_id` INT NULL,
  PRIMARY KEY (`spv_contact_id`),
  UNIQUE INDEX `s_spv_email_address_UNIQUE` (`spv_email` ASC),
  UNIQUE INDEX `s_spv_contact_no_UNIQUE` (`spv_mobile` ASC),
  INDEX `s_spv_id_idx` (`spv_id` ASC),
  INDEX `dep_id_idx` (`dep_id` ASC),
  INDEX `bldg_id_idx` (`bldg_id` ASC),
  CONSTRAINT `spv_id`
    FOREIGN KEY (`spv_id`)
    REFERENCES `2016-01-23_urr_db`.`supervisor_info` (`spv_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `dep_id`
    FOREIGN KEY (`dep_id`)
    REFERENCES `2016-01-23_urr_db`.`department_info` (`dep_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `2016-01-23_urr_db`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_duration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_duration` (
  `trainee_duration_id` INT NOT NULL AUTO_INCREMENT,
  `trainee_id` VARCHAR(15) NOT NULL,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `extend_date` DATE NULL,
  PRIMARY KEY (`trainee_duration_id`),
  INDEX `s_tr_id_idx` (`trainee_id` ASC),
  CONSTRAINT `trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_account` (
  `trainee_acc_id` INT NOT NULL,
  `trainee_id` VARCHAR(15) NOT NULL,
  `account_name` VARCHAR(40) NULL,
  `trainee_email` VARCHAR(50) NULL,
  `keycard_id` VARCHAR(20) NULL,
  PRIMARY KEY (`trainee_acc_id`),
  UNIQUE INDEX `s_tr_wd_email_address_UNIQUE` (`trainee_acc_id` ASC),
  INDEX `s_tr_id_idx` (`trainee_id` ASC),
  CONSTRAINT `trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_relationship`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_relationship` (
  `relation_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NULL,
  `relation_type` VARCHAR(50) NOT NULL,
  `relation_fname` VARCHAR(20) NOT NULL,
  `relation_lname` VARCHAR(20) NOT NULL,
  `relation_occupation` VARCHAR(50) NULL,
  `relation_contact` VARCHAR(20) NULL,
  PRIMARY KEY (`relation_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`student_national_id`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`student_national_id` (
  `national_id` INT NOT NULL,
  `s_id` INT NULL,
  `thai_id` INT NULL,
  `passport_no` VARCHAR(15) NULL,
  PRIMARY KEY (`national_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`ability_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`ability_info` (
  `ability_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NULL,
  `ability_desc` TEXT NOT NULL,
  PRIMARY KEY (`ability_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`language`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`language` (
  `lang_id` INT NOT NULL AUTO_INCREMENT,
  `lang_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`lang_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`language_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`language_info` (
  `lang_info_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NOT NULL,
  `lang_id` INT NULL,
  `Reading` VARCHAR(4) NULL,
  `Writing` VARCHAR(4) NULL,
  `Speaking` VARCHAR(4) NULL,
  PRIMARY KEY (`lang_info_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `lang_id_idx` (`lang_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `lang_id`
    FOREIGN KEY (`lang_id`)
    REFERENCES `2016-01-23_urr_db`.`language` (`lang_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`hobby_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`hobby_info` (
  `hobby_id` INT NOT NULL,
  `s_id` INT NULL,
  `hobby_desc` TEXT NULL,
  PRIMARY KEY (`hobby_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`email_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`email_info` (
  `email_id` INT NOT NULL AUTO_INCREMENT,
  `email_subject` VARCHAR(100) NOT NULL,
  `email_body` TEXT NULL,
  `email_attachment` BLOB NULL,
  `email_signature` TEXT NOT NULL,
  PRIMARY KEY (`email_id`));


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`sent_email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`sent_email` (
  `st_email_id` INT NOT NULL AUTO_INCREMENT,
  `email_id` INT NOT NULL,
  `s_id` INT NULL,
  `sent_date` DATE NULL,
  `sent_time` TIME NULL,
  PRIMARY KEY (`st_email_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `email_id_idx` (`email_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `email_id`
    FOREIGN KEY (`email_id`)
    REFERENCES `2016-01-23_urr_db`.`email_info` (`email_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`schedule_email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`schedule_email` (
  `sch_email_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NOT NULL,
  `email_id` INT NULL,
  `sch_date` DATE NULL,
  `sch_time` TIME NULL,
  PRIMARY KEY (`sch_email_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `email_id_idx` (`email_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `email_id`
    FOREIGN KEY (`email_id`)
    REFERENCES `2016-01-23_urr_db`.`email_info` (`email_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`training_course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`training_course` (
  `course_id` INT NOT NULL AUTO_INCREMENT,
  `course_name` VARCHAR(50) NOT NULL,
  `course_detail` TEXT NULL,
  `course_start_time` TIME NULL,
  `course_end_time` TIME NULL,
  `course_date` DATE NULL,
  `course_room` VARCHAR(10) NULL,
  `bldg_id` INT NULL,
  PRIMARY KEY (`course_id`),
  INDEX `bldg_id_idx` (`bldg_id` ASC),
  CONSTRAINT `bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `2016-01-23_urr_db`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_activity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_activity` (
  `activity_id` INT NOT NULL AUTO_INCREMENT,
  `activity_name` VARCHAR(50) NOT NULL,
  `activity_detail` TEXT NULL,
  `start_date` TIME NULL,
  `end_date` TIME NULL,
  `activity_day` DATE NULL,
  `activity_room` VARCHAR(10) NULL,
  `bldg_id` INT NULL,
  PRIMARY KEY (`activity_id`),
  INDEX `bldg_id_idx` (`bldg_id` ASC),
  CONSTRAINT `bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `2016-01-23_urr_db`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_activity_course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_activity_course` (
  `trainee_activity_course` INT NOT NULL,
  `activity_id` INT NOT NULL,
  `course_id` INT NULL,
  `trainee_id` VARCHAR(15) NULL,
  PRIMARY KEY (`trainee_activity_course`),
  INDEX `activity_id_idx` (`activity_id` ASC),
  INDEX `course_id_idx` (`course_id` ASC),
  INDEX `s_tr_id_idx` (`trainee_id` ASC),
  CONSTRAINT `activity_id`
    FOREIGN KEY (`activity_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_activity` (`activity_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `course_id`
    FOREIGN KEY (`course_id`)
    REFERENCES `2016-01-23_urr_db`.`training_course` (`course_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`trainee_bank`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`trainee_bank` (
  `account_number` INT UNSIGNED NOT NULL,
  `account_name` VARCHAR(40) NOT NULL,
  `trainee_id` VARCHAR(15) NULL,
  `bank_name` VARCHAR(50) NOT NULL,
  `bank_branch` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`account_number`),
  INDEX `trainee_id_idx` (`trainee_id` ASC),
  CONSTRAINT `trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `2016-01-23_urr_db`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`test_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`test_info` (
  `test_id` INT NOT NULL AUTO_INCREMENT,
  `test_name` VARCHAR(20) NOT NULL,
  `s_id` INT NULL,
  `test_time` TIME NOT NULL,
  `test_date` DATE NOT NULL,
  `test_room` VARCHAR(15) NULL,
  `test_score` VARCHAR(10) NULL,
  PRIMARY KEY (`test_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `2016-01-23_urr_db`.`student_info` (`s_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`interview_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`interview_info` (
  `interview_id` INT NOT NULL,
  `applicantion_id` INT NOT NULL,
  `interview_type` VARCHAR(50) NULL,
  `interview_time` TIME NULL,
  `interview_date` DATE NULL,
  PRIMARY KEY (`interview_id`),
  INDEX `application_id_idx` (`applicantion_id` ASC),
  CONSTRAINT `application_id`
    FOREIGN KEY (`applicantion_id`)
    REFERENCES `2016-01-23_urr_db`.`application` (`application_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`visa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`visa` (
  `visa_id` INT NOT NULL AUTO_INCREMENT,
  `visa_name` VARCHAR(45) NOT NULL,
  `application_application_id` INT NULL,
  PRIMARY KEY (`visa_id`),
  INDEX `fk_visa_application1_idx` (`application_application_id` ASC),
  CONSTRAINT `fk_visa_application1`
    FOREIGN KEY (`application_application_id`)
    REFERENCES `2016-01-23_urr_db`.`application` (`application_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `2016-01-23_urr_db`.`other_doc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `2016-01-23_urr_db`.`other_doc` (
  `other_id` INT NOT NULL AUTO_INCREMENT,
  `other_name` VARCHAR(45) NOT NULL,
  `application_application_id` INT NULL,
  PRIMARY KEY (`other_id`),
  INDEX `fk_other_doc_application1_idx` (`application_application_id` ASC),
  CONSTRAINT `fk_other_doc_application1`
    FOREIGN KEY (`application_application_id`)
    REFERENCES `2016-01-23_urr_db`.`application` (`application_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
