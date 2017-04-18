-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema urr_dbv
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema urr_dbv
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `urr_dbv` DEFAULT CHARACTER SET utf8 ;
USE `urr_dbv` ;

-- -----------------------------------------------------
-- Table `urr_dbv`.`student_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_type` (
  `type_id` INT NOT NULL AUTO_INCREMENT,
  `type_name` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`type_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_origin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_origin` (
  `origin_id` INT NOT NULL AUTO_INCREMENT,
  `origin_name` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`origin_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_status` (
  `status_id` INT NOT NULL AUTO_INCREMENT,
  `status_desc` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`status_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_reference_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_reference_info` (
  `ref_id` INT NOT NULL AUTO_INCREMENT,
  `ref_fname` VARCHAR(20) NULL,
  `ref_lname` VARCHAR(20) NULL,
  `ref_contact` VARCHAR(12) NULL,
  `ref_email` VARCHAR(100) NULL,
  PRIMARY KEY (`ref_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_national_id`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_national_id` (
  `national_id` INT NOT NULL,
  `thai_id` INT NULL,
  `passport_no` VARCHAR(15) NULL,
  PRIMARY KEY (`national_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`title`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`title` (
  `title_id` INT NOT NULL AUTO_INCREMENT,
  `title_name` VARCHAR(45) NOT NULL,
  `sex` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`title_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_dbv`.`intitute_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`intitute_type` (
  `intitute_type_id` INT NOT NULL AUTO_INCREMENT,
  `intitute_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`intitute_type_id`),
  UNIQUE INDEX `intitute_name_UNIQUE` (`intitute_name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_info` (
  `s_id` INT NOT NULL AUTO_INCREMENT,
  `s_fname` VARCHAR(20) NOT NULL,
  `s_lname` VARCHAR(20) NOT NULL,
  `thai_fname` VARCHAR(20) NULL,
  `thai_lname` VARCHAR(20) NULL,
  `s_dob` DATE NULL,
  `remark` TEXT NULL,
  `origin_id` INT NULL,
  `type_id` INT NULL,
  `status_id` INT NULL,
  `ref_id` INT NULL,
  `national_id` INT NULL,
  `title_title_id` INT NOT NULL,
  `intitute_type_id` INT NULL,
  PRIMARY KEY (`s_id`),
  INDEX `s_status_id_idx` (`status_id` ASC),
  INDEX `s_type_id_idx` (`type_id` ASC),
  INDEX `s_origin_id_idx` (`origin_id` ASC),
  INDEX `s_ref_id_idx` (`ref_id` ASC),
  INDEX `fk_student_info_student_national_id1_idx` (`national_id` ASC),
  INDEX `fk_student_info_title1_idx` (`title_title_id` ASC),
  INDEX `fk_student_info_intitute_type1_idx` (`intitute_type_id` ASC),
  CONSTRAINT `fkstu_status_id`
    FOREIGN KEY (`status_id`)
    REFERENCES `urr_dbv`.`student_status` (`status_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkstu_type_id`
    FOREIGN KEY (`type_id`)
    REFERENCES `urr_dbv`.`student_type` (`type_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkstu_origin_id`
    FOREIGN KEY (`origin_id`)
    REFERENCES `urr_dbv`.`student_origin` (`origin_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkstu_ref_id`
    FOREIGN KEY (`ref_id`)
    REFERENCES `urr_dbv`.`student_reference_info` (`ref_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkstu_national_id1`
    FOREIGN KEY (`national_id`)
    REFERENCES `urr_dbv`.`student_national_id` (`national_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkstu_title1`
    FOREIGN KEY (`title_title_id`)
    REFERENCES `urr_dbv`.`title` (`title_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkstu_intitute_type1`
    FOREIGN KEY (`intitute_type_id`)
    REFERENCES `urr_dbv`.`intitute_type` (`intitute_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`application`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`application` (
  `application_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NULL,
  `application_time` TIME NULL,
  `application_date` DATE NULL,
  `application_status` VARCHAR(45) NULL,
  PRIMARY KEY (`application_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `fkapp_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`resume`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`resume` (
  `resume_id` INT NOT NULL AUTO_INCREMENT,
  `resume_name` VARCHAR(50) NOT NULL,
  `application_id` INT NULL,
  PRIMARY KEY (`resume_id`),
  INDEX `appilication_id_idx` (`application_id` ASC),
  CONSTRAINT `fkres_appilication_id`
    FOREIGN KEY (`application_id`)
    REFERENCES `urr_dbv`.`application` (`application_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`video` (
  `video_id` INT NOT NULL AUTO_INCREMENT,
  `video_name` VARCHAR(50) NOT NULL,
  `application_id` INT NULL,
  PRIMARY KEY (`video_id`),
  INDEX `application_id_idx` (`application_id` ASC),
  CONSTRAINT `fkvid_application_id`
    FOREIGN KEY (`application_id`)
    REFERENCES `urr_dbv`.`application` (`application_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`transcript`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`transcript` (
  `transcript_id` INT NOT NULL AUTO_INCREMENT,
  `transcript_name` VARCHAR(50) NOT NULL,
  `application_id` INT NULL,
  PRIMARY KEY (`transcript_id`),
  INDEX `application_id_idx` (`application_id` ASC),
  CONSTRAINT `fktra_application_id`
    FOREIGN KEY (`application_id`)
    REFERENCES `urr_dbv`.`application` (`application_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`major_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`major_info` (
  `major_id` INT NOT NULL AUTO_INCREMENT,
  `major_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`major_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`degree_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`degree_info` (
  `degree_id` INT NOT NULL AUTO_INCREMENT,
  `degree_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`degree_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`country_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`country_list` (
  `country_id` INT NOT NULL AUTO_INCREMENT,
  `country_name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`country_id`),
  UNIQUE INDEX `country_name_UNIQUE` (`country_name` ASC));


-- -----------------------------------------------------
-- Table `urr_dbv`.`university_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`university_info` (
  `uni_id` INT NOT NULL AUTO_INCREMENT,
  `uni_name` VARCHAR(100) NOT NULL,
  `gpa` FLOAT NULL,
  `start_year` DATE NULL,
  `end_year` DATE NULL,
  `year` INT NULL,
  `country_id` INT NULL,
  `intitute_type_id` INT NOT NULL,
  PRIMARY KEY (`uni_id`),
  INDEX `country_id_idx` (`country_id` ASC),
  INDEX `fk_university_info_intitute_type1_idx` (`intitute_type_id` ASC),
  CONSTRAINT `fkuni_country_id`
    FOREIGN KEY (`country_id`)
    REFERENCES `urr_dbv`.`country_list` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkuni_intitute_type1`
    FOREIGN KEY (`intitute_type_id`)
    REFERENCES `urr_dbv`.`intitute_type` (`intitute_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`collage_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`collage_info` (
  `collage_id` INT NOT NULL AUTO_INCREMENT,
  `collage_name` VARCHAR(100) NOT NULL,
  `start_year` DATE NULL,
  `end_year` DATE NULL,
  `year` VARCHAR(5) NULL,
  `country_id` INT NULL,
  `idintitute_type_id` INT NOT NULL,
  PRIMARY KEY (`collage_id`),
  INDEX `country_id_idx` (`country_id` ASC),
  INDEX `fk_cpllage_info_intitute_type1_idx` (`idintitute_type_id` ASC),
  CONSTRAINT `fkcol_country_id`
    FOREIGN KEY (`country_id`)
    REFERENCES `urr_dbv`.`country_list` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkcol_intitute_type1`
    FOREIGN KEY (`idintitute_type_id`)
    REFERENCES `urr_dbv`.`intitute_type` (`intitute_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_contact_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_contact_details` (
  `contact_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NULL,
  `contact_no` VARCHAR(12) NULL,
  `email_adress` VARCHAR(50) NULL,
  PRIMARY KEY (`contact_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  UNIQUE INDEX `email_adress_UNIQUE` (`email_adress` ASC),
  CONSTRAINT `fksco_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_emergency_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_emergency_contact` (
  `emc_id` INT NOT NULL AUTO_INCREMENT,
  `emc_fname` VARCHAR(20) NOT NULL,
  `emc_lname` VARCHAR(20) NULL,
  `emc_relation` VARCHAR(50) NULL,
  `emc_contact` VARCHAR(12) NULL,
  `contact_id` INT NULL,
  PRIMARY KEY (`emc_id`),
  INDEX `fk_student_emergency_contact_student_contact_details1_idx` (`contact_id` ASC),
  CONSTRAINT `fk_student_emergency_contact_student_contact_details1`
    FOREIGN KEY (`contact_id`)
    REFERENCES `urr_dbv`.`student_contact_details` (`contact_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_address` (
  `address_Id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NULL,
  `place_name` VARCHAR(100) NULL,
  `road_name` VARCHAR(100) NULL,
  `sub_district` VARCHAR(100) NULL,
  `district` VARCHAR(100) NULL,
  `city` VARCHAR(100) NULL,
  `zip_code` INT NULL,
  `province_name` VARCHAR(100) NULL,
  `country_id` INT NULL,
  PRIMARY KEY (`address_Id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `country_id_idx` (`country_id` ASC),
  CONSTRAINT `fksad_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fksad_country_id`
    FOREIGN KEY (`country_id`)
    REFERENCES `urr_dbv`.`country_list` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_job`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_job` (
  `job_id` INT NOT NULL AUTO_INCREMENT,
  `job_desc` TEXT NOT NULL,
  PRIMARY KEY (`job_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`building_id`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`building_id` (
  `bldg_id` INT NOT NULL AUTO_INCREMENT,
  `bldg_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`bldg_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`department_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`department_info` (
  `dep_id` INT NOT NULL AUTO_INCREMENT,
  `dep_name` VARCHAR(100) NOT NULL,
  `dep_ext` INT NULL,
  `bldg_id` INT NULL,
  PRIMARY KEY (`dep_id`),
  INDEX `bldg_id_idx` (`bldg_id` ASC),
  CONSTRAINT `fkdep_bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `urr_dbv`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_presentation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_presentation` (
  `presentation_id` INT NOT NULL AUTO_INCREMENT,
  `presentation_date` DATE NULL,
  `presentation_time` TIME NULL,
  `remark` TEXT NULL,
  `presentation_score` FLOAT NULL,
  `presentaiton_room` VARCHAR(10) NULL,
  `bldg_id` INT NULL,
  PRIMARY KEY (`presentation_id`),
  INDEX `bldg_id_idx` (`bldg_id` ASC),
  CONSTRAINT `fkpre_bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `urr_dbv`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_transportation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_transportation` (
  `transportation_id` INT NOT NULL,
  `driver_fname` VARCHAR(20) NULL,
  `driver_lname` VARCHAR(20) NULL,
  `vehicle_no` VARCHAR(5) NULL,
  `driver_mobile` VARCHAR(12) NULL,
  `destination_name` VARCHAR(50) NULL,
  PRIMARY KEY (`transportation_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`plant_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`plant_info` (
  `plant_id` INT NOT NULL AUTO_INCREMENT,
  `plant_name` VARCHAR(50) NOT NULL,
  `country_id` INT NULL,
  PRIMARY KEY (`plant_id`),
  INDEX `country_id_idx` (`country_id` ASC),
  CONSTRAINT `fkpla_country_id`
    FOREIGN KEY (`country_id`)
    REFERENCES `urr_dbv`.`country_list` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`location` (
  `location_id` INT NOT NULL,
  `location_name` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`location_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_account` (
  `trainee_acc_id` INT NOT NULL,
  `account_name` VARCHAR(40) NULL,
  `trainee_email` VARCHAR(50) NULL,
  `keycard_id` VARCHAR(20) NULL,
  PRIMARY KEY (`trainee_acc_id`),
  UNIQUE INDEX `s_tr_wd_email_address_UNIQUE` (`trainee_acc_id` ASC));


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_info` (
  `trainee_id` VARCHAR(15) NOT NULL,
  `s_id` INT NOT NULL,
  `job_id` INT NULL,
  `trainee_presentation_id` INT NULL,
  `dep_id` INT NULL,
  `transportation_id` INT NULL,
  `plant_id` INT NULL,
  `location_id` INT NULL,
  `trainee_account_trainee_acc_id` INT NULL,
  PRIMARY KEY (`trainee_id`),
  UNIQUE INDEX `s_trainee_info_id_UNIQUE` (`trainee_id` ASC),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `s_job_id_idx` (`job_id` ASC),
  INDEX `dep_id_idx` (`dep_id` ASC),
  INDEX `s_pres_id_idx` (`trainee_presentation_id` ASC),
  INDEX `s_trps_id_idx` (`transportation_id` ASC),
  INDEX `plant_id_idx` (`plant_id` ASC),
  INDEX `location_id_idx` (`location_id` ASC),
  INDEX `fk_trainee_info_trainee_account1_idx` (`trainee_account_trainee_acc_id` ASC),
  CONSTRAINT `fktrn_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fktrn_trainee_job_id`
    FOREIGN KEY (`job_id`)
    REFERENCES `urr_dbv`.`trainee_job` (`job_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fktrn_dep_id`
    FOREIGN KEY (`dep_id`)
    REFERENCES `urr_dbv`.`department_info` (`dep_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fktrn_presentation_id`
    FOREIGN KEY (`trainee_presentation_id`)
    REFERENCES `urr_dbv`.`trainee_presentation` (`presentation_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fktrn_transportation_id`
    FOREIGN KEY (`transportation_id`)
    REFERENCES `urr_dbv`.`trainee_transportation` (`transportation_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fktrn_plant_id`
    FOREIGN KEY (`plant_id`)
    REFERENCES `urr_dbv`.`plant_info` (`plant_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fktrn_location_id`
    FOREIGN KEY (`location_id`)
    REFERENCES `urr_dbv`.`location` (`location_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_trainee_info_trainee_account1`
    FOREIGN KEY (`trainee_account_trainee_acc_id`)
    REFERENCES `urr_dbv`.`trainee_account` (`trainee_acc_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`immigration_office`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`immigration_office` (
  `img_id` INT NOT NULL AUTO_INCREMENT,
  `img_name` VARCHAR(100) NOT NULL,
  `img_location` TEXT NULL,
  PRIMARY KEY (`img_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_visa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_visa` (
  `visa_id` INT NOT NULL AUTO_INCREMENT,
  `trainee_id` VARCHAR(15) NOT NULL,
  `visa_exp_date` DATE NULL,
  `visa_email_date` DATE NULL,
  `img_id` INT NULL,
  PRIMARY KEY (`visa_id`),
  INDEX `s_tr_id_idx` (`trainee_id` ASC),
  INDEX `img_id_idx` (`img_id` ASC),
  CONSTRAINT `fkvis_trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `urr_dbv`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkvis_img_id`
    FOREIGN KEY (`img_id`)
    REFERENCES `urr_dbv`.`immigration_office` (`img_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_project` (
  `project_id` INT NOT NULL AUTO_INCREMENT,
  `project_name` VARCHAR(100) NOT NULL,
  `project_detail` TEXT NULL,
  PRIMARY KEY (`project_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`supervisor_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`supervisor_info` (
  `spv_id` INT NOT NULL AUTO_INCREMENT,
  `spv_fname` VARCHAR(20) NOT NULL,
  `spv_lname` VARCHAR(20) NOT NULL,
  `spv_job` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`spv_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`supervisor_contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`supervisor_contact` (
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
  CONSTRAINT `fkspvc_spv_id`
    FOREIGN KEY (`spv_id`)
    REFERENCES `urr_dbv`.`supervisor_info` (`spv_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkspvc_dep_id`
    FOREIGN KEY (`dep_id`)
    REFERENCES `urr_dbv`.`department_info` (`dep_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkspvc_bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `urr_dbv`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_duration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_duration` (
  `trainee_duration_id` INT NOT NULL AUTO_INCREMENT,
  `trainee_id` VARCHAR(15) NULL,
  `start_date` DATE NULL,
  `end_date` DATE NULL,
  `extend_date` DATE NULL,
  PRIMARY KEY (`trainee_duration_id`),
  INDEX `s_tr_id_idx` (`trainee_id` ASC),
  CONSTRAINT `fkdur_trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `urr_dbv`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`student_relationship`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`student_relationship` (
  `relation_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NULL,
  `relation_type` VARCHAR(50) NOT NULL,
  `relation_fname` VARCHAR(20) NOT NULL,
  `relation_lname` VARCHAR(20) NOT NULL,
  `relation_occupation` VARCHAR(50) NULL,
  `relation_contact` VARCHAR(20) NULL,
  PRIMARY KEY (`relation_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `fkrel_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`language`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`language` (
  `lang_id` INT NOT NULL AUTO_INCREMENT,
  `lang_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`lang_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`language_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`language_info` (
  `lang_info_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NULL,
  `Reading` VARCHAR(4) NULL,
  `Writing` VARCHAR(4) NULL,
  `Speaking` VARCHAR(4) NULL,
  PRIMARY KEY (`lang_info_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `fklan_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`hobby_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`hobby_info` (
  `hobby_id` INT NOT NULL,
  `s_id` INT NULL,
  `hobby_desc` TEXT NULL,
  PRIMARY KEY (`hobby_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `fkhob_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`email_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`email_info` (
  `email_id` INT NOT NULL AUTO_INCREMENT,
  `email_subject` VARCHAR(100) NOT NULL,
  `email_body` TEXT NULL,
  `email_attachment` BLOB NULL,
  `email_signature` TEXT NOT NULL,
  PRIMARY KEY (`email_id`));


-- -----------------------------------------------------
-- Table `urr_dbv`.`sent_email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`sent_email` (
  `st_email_id` INT NOT NULL AUTO_INCREMENT,
  `email_id` INT NOT NULL,
  `s_id` INT NULL,
  `sent_date` DATE NULL,
  `sent_time` TIME NULL,
  PRIMARY KEY (`st_email_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `email_id_idx` (`email_id` ASC),
  CONSTRAINT `fksene_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fksene_email_id`
    FOREIGN KEY (`email_id`)
    REFERENCES `urr_dbv`.`email_info` (`email_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`schedule_email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`schedule_email` (
  `sch_email_id` INT NOT NULL AUTO_INCREMENT,
  `s_id` INT NOT NULL,
  `email_id` INT NULL,
  `sch_date` DATE NULL,
  `sch_time` TIME NULL,
  PRIMARY KEY (`sch_email_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  INDEX `email_id_idx` (`email_id` ASC),
  CONSTRAINT `fksch_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fksch_email_id`
    FOREIGN KEY (`email_id`)
    REFERENCES `urr_dbv`.`email_info` (`email_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`training_course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`training_course` (
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
  CONSTRAINT `fkcou_bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `urr_dbv`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_activity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_activity` (
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
  CONSTRAINT `fkact_bldg_id`
    FOREIGN KEY (`bldg_id`)
    REFERENCES `urr_dbv`.`building_id` (`bldg_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_activity_course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_activity_course` (
  `trainee_activity_course` INT NOT NULL,
  `activity_id` INT NOT NULL,
  `course_id` INT NULL,
  `trainee_id` VARCHAR(15) NULL,
  PRIMARY KEY (`trainee_activity_course`),
  INDEX `activity_id_idx` (`activity_id` ASC),
  INDEX `course_id_idx` (`course_id` ASC),
  INDEX `s_tr_id_idx` (`trainee_id` ASC),
  CONSTRAINT `fkactc_activity_id`
    FOREIGN KEY (`activity_id`)
    REFERENCES `urr_dbv`.`trainee_activity` (`activity_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkactc_course_id`
    FOREIGN KEY (`course_id`)
    REFERENCES `urr_dbv`.`training_course` (`course_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkactc_trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `urr_dbv`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_bank`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_bank` (
  `account_number` INT UNSIGNED NOT NULL,
  `account_name` VARCHAR(40) NOT NULL,
  `trainee_id` VARCHAR(15) NULL,
  `bank_name` VARCHAR(50) NOT NULL,
  `bank_branch` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`account_number`),
  INDEX `trainee_id_idx` (`trainee_id` ASC),
  CONSTRAINT `fkbnk_trainee_id`
    FOREIGN KEY (`trainee_id`)
    REFERENCES `urr_dbv`.`trainee_info` (`trainee_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`test_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`test_info` (
  `test_id` INT NOT NULL AUTO_INCREMENT,
  `test_name` VARCHAR(20) NOT NULL,
  `s_id` INT NULL,
  `test_time` TIME NULL,
  `test_date` DATE NULL,
  `test_room` VARCHAR(15) NULL,
  `test_score` VARCHAR(10) NULL,
  PRIMARY KEY (`test_id`),
  INDEX `s_id_idx` (`s_id` ASC),
  CONSTRAINT `fktes_s_id`
    FOREIGN KEY (`s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`interview_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`interview_info` (
  `interview_id` INT NOT NULL,
  `applicantion_id` INT NULL,
  `interview_type` VARCHAR(50) NULL,
  `interview_time` TIME NULL,
  `interview_date` DATE NULL,
  PRIMARY KEY (`interview_id`),
  INDEX `application_id_idx` (`applicantion_id` ASC),
  CONSTRAINT `fkitv_application_id`
    FOREIGN KEY (`applicantion_id`)
    REFERENCES `urr_dbv`.`application` (`application_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `urr_dbv`.`language_has_language_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`language_has_language_info` (
  `language_lang_id` INT NOT NULL,
  `language_info_lang_info_id` INT NOT NULL,
  PRIMARY KEY (`language_lang_id`, `language_info_lang_info_id`),
  INDEX `fk_language_has_language_info_language_info1_idx` (`language_info_lang_info_id` ASC),
  INDEX `fk_language_has_language_info_language1_idx` (`language_lang_id` ASC),
  CONSTRAINT `fk_language_has_language_info_language1`
    FOREIGN KEY (`language_lang_id`)
    REFERENCES `urr_dbv`.`language` (`lang_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_language_has_language_info_language_info1`
    FOREIGN KEY (`language_info_lang_info_id`)
    REFERENCES `urr_dbv`.`language_info` (`lang_info_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`trainee_project_has_trainee_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`trainee_project_has_trainee_info` (
  `trainee_project_project_id` INT NOT NULL,
  `trainee_info_trainee_id` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`trainee_project_project_id`, `trainee_info_trainee_id`),
  INDEX `fk_trainee_project_has_trainee_info_trainee_info1_idx` (`trainee_info_trainee_id` ASC),
  INDEX `fk_trainee_project_has_trainee_info_trainee_project1_idx` (`trainee_project_project_id` ASC),
  CONSTRAINT `fk_trainee_project_has_trainee_info_trainee_project1`
    FOREIGN KEY (`trainee_project_project_id`)
    REFERENCES `urr_dbv`.`trainee_project` (`project_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trainee_project_has_trainee_info_trainee_info1`
    FOREIGN KEY (`trainee_info_trainee_id`)
    REFERENCES `urr_dbv`.`trainee_info` (`trainee_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`supervisor_info_has_student_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`supervisor_info_has_student_info` (
  `supervisor_info_spv_id` INT NOT NULL,
  `student_info_s_id` INT NOT NULL,
  PRIMARY KEY (`supervisor_info_spv_id`, `student_info_s_id`),
  INDEX `fk_supervisor_info_has_student_info_student_info1_idx` (`student_info_s_id` ASC),
  INDEX `fk_supervisor_info_has_student_info_supervisor_info1_idx` (`supervisor_info_spv_id` ASC),
  CONSTRAINT `fk_supervisor_info_has_student_info_supervisor_info1`
    FOREIGN KEY (`supervisor_info_spv_id`)
    REFERENCES `urr_dbv`.`supervisor_info` (`spv_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_supervisor_info_has_student_info_student_info1`
    FOREIGN KEY (`student_info_s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`degree_info_has_university_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`degree_info_has_university_info` (
  `degree_id` INT NOT NULL,
  `uni_id` INT NOT NULL,
  PRIMARY KEY (`degree_id`, `uni_id`),
  INDEX `fk_degree_info_has_university_info_university_info1_idx` (`uni_id` ASC),
  INDEX `fk_degree_info_has_university_info_degree_info1_idx` (`degree_id` ASC),
  CONSTRAINT `fk_degree_info_has_university_info_degree_info1`
    FOREIGN KEY (`degree_id`)
    REFERENCES `urr_dbv`.`degree_info` (`degree_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_degree_info_has_university_info_university_info1`
    FOREIGN KEY (`uni_id`)
    REFERENCES `urr_dbv`.`university_info` (`uni_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`major_info_has_university_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`major_info_has_university_info` (
  `major_id` INT NOT NULL,
  `uni_id` INT NOT NULL,
  PRIMARY KEY (`major_id`, `uni_id`),
  INDEX `fk_major_info_has_university_info_university_info1_idx` (`uni_id` ASC),
  INDEX `fk_major_info_has_university_info_major_info1_idx` (`major_id` ASC),
  CONSTRAINT `fk_major_info_has_university_info_major_info1`
    FOREIGN KEY (`major_id`)
    REFERENCES `urr_dbv`.`major_info` (`major_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_major_info_has_university_info_university_info1`
    FOREIGN KEY (`uni_id`)
    REFERENCES `urr_dbv`.`university_info` (`uni_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`visa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`visa` (
  `visa_id` INT NOT NULL AUTO_INCREMENT,
  `visa_name` VARCHAR(45) NOT NULL,
  `application_application_id` INT NULL,
  PRIMARY KEY (`visa_id`),
  INDEX `fk_visa_application1_idx` (`application_application_id` ASC),
  CONSTRAINT `fk_visa_application1`
    FOREIGN KEY (`application_application_id`)
    REFERENCES `urr_dbv`.`application` (`application_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_dbv`.`other_doc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`other_doc` (
  `idother_id` INT NOT NULL AUTO_INCREMENT,
  `other_name` VARCHAR(45) NOT NULL,
  `application_application_id` INT NULL,
  PRIMARY KEY (`idother_id`),
  INDEX `fk_other_doc_application1_idx` (`application_application_id` ASC),
  CONSTRAINT `fk_other_doc_application1`
    FOREIGN KEY (`application_application_id`)
    REFERENCES `urr_dbv`.`application` (`application_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_dbv`.`education_blackgrounf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`education_blackgrounf` (
  `edb_id` INT NOT NULL AUTO_INCREMENT,
  `duration` DATE NULL,
  `name` VARCHAR(45) NOT NULL,
  `intitute` VARCHAR(45) NOT NULL,
  `student_info_s_id` INT NULL,
  PRIMARY KEY (`edb_id`),
  INDEX `fk_education_blackgrounf_student_info1_idx` (`student_info_s_id` ASC),
  CONSTRAINT `fk_education_blackgrounf_student_info1`
    FOREIGN KEY (`student_info_s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_dbv`.`work_experience`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`work_experience` (
  `wex_id` INT NOT NULL AUTO_INCREMENT,
  `wex_duration` DATE NULL,
  `wex_detail` TEXT NULL,
  `student_info_s_id` INT NULL,
  PRIMARY KEY (`wex_id`),
  INDEX `fk_work_experience_student_info1_idx` (`student_info_s_id` ASC),
  CONSTRAINT `fk_work_experience_student_info1`
    FOREIGN KEY (`student_info_s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_dbv`.`extracurricular_act`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`extracurricular_act` (
  `exact_id` INT NOT NULL AUTO_INCREMENT,
  `exact_name` VARCHAR(45) NULL,
  `exact_detail` TEXT NULL,
  `student_info_s_id` INT NULL,
  PRIMARY KEY (`exact_id`),
  INDEX `fk_extracurricular_act_student_info1_idx` (`student_info_s_id` ASC),
  CONSTRAINT `fk_extracurricular_act_student_info1`
    FOREIGN KEY (`student_info_s_id`)
    REFERENCES `urr_dbv`.`student_info` (`s_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urr_dbv`.`degree_info_has_cpllage_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`degree_info_has_cpllage_info` (
  `degree_id` INT NOT NULL,
  `institute_id` INT NOT NULL,
  PRIMARY KEY (`degree_id`, `institute_id`),
  INDEX `fk_degree_info_has_cpllage_info_cpllage_info1_idx` (`institute_id` ASC),
  INDEX `fk_degree_info_has_cpllage_info_degree_info1_idx` (`degree_id` ASC),
  CONSTRAINT `fk_degree_info_has_cpllage_info_degree_info1`
    FOREIGN KEY (`degree_id`)
    REFERENCES `urr_dbv`.`degree_info` (`degree_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_degree_info_has_cpllage_info_cpllage_info1`
    FOREIGN KEY (`institute_id`)
    REFERENCES `urr_dbv`.`collage_info` (`collage_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `urr_dbv`.`major_info_has_cpllage_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urr_dbv`.`major_info_has_cpllage_info` (
  `major_id` INT NOT NULL,
  `institute_id` INT NOT NULL,
  PRIMARY KEY (`major_id`, `institute_id`),
  INDEX `fk_major_info_has_cpllage_info_cpllage_info1_idx` (`institute_id` ASC),
  INDEX `fk_major_info_has_cpllage_info_major_info1_idx` (`major_id` ASC),
  CONSTRAINT `fk_major_info_has_cpllage_info_major_info1`
    FOREIGN KEY (`major_id`)
    REFERENCES `urr_dbv`.`major_info` (`major_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_major_info_has_cpllage_info_cpllage_info1`
    FOREIGN KEY (`institute_id`)
    REFERENCES `urr_dbv`.`collage_info` (`collage_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
