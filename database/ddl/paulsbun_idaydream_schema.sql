-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema idaydream
-- -----------------------------------------------------
USE idaydream ;

-- -----------------------------------------------------
-- Table paulsbun_idaydream.ethnicities
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.ethnicities ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.ethnicities (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  ethnicity VARCHAR(45) NOT NULL,
  sort_order INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX code_UNIQUE (code ASC),
  UNIQUE INDEX ethnicity_UNIQUE (ethnicity ASC),
  UNIQUE INDEX sort_order_unique (sort_order ASC),
  UNIQUE INDEX id_UNIQUE (id ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into ethnicities (code, ethnicity, sort_order) values ('cd-native','American Indian or Alaska Native', 1);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-asian','Asian or Asian American', 2);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-black','Black or African American', 3);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-hispanic','Hispanic or Latino/a', 4);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-mena','Middle Eastern or MENA', 5);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-islander','Native Hawaiian or Other Pacific Islander', 6);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-seAsian','Southeast Asian', 7);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-white','White non-Hispanic', 8);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-multi','BI/Multiracial', 9);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-decline','Declined to State', 10);

-- -----------------------------------------------------
-- Table paulsbun_idaydream.genders
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.genders ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.genders (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  gender VARCHAR(45) NOT NULL,
  sort_order INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX gender_UNIQUE (gender ASC),
  UNIQUE INDEX code_UNIQUE (code ASC),
  UNIQUE INDEX sort_order_unique (sort_order ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into genders (code, gender, sort_order) values ('cd-male', 'M', 1);
insert into genders (code, gender, sort_order) values ('cd-female', 'F', 2);
insert into genders (code, gender, sort_order) values ('cd-other', 'Other', 3);
insert into genders (code, gender, sort_order) values ('cd-noSay', 'Prefer not to Say', 4);

-- -----------------------------------------------------
-- Table paulsbun_idaydream.lead_sources
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.lead_sources ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.lead_sources (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  lead VARCHAR(45) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  UNIQUE INDEX lead_UNIQUE (lead ASC),
  UNIQUE INDEX code_UNIQUE (code ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into lead_sources (lead, code) values ('Word of Mouth/Friend/Colleague', 'cd-wordOfMouth');
insert into lead_sources (lead, code) values ('Web/Social Media', 'cd-webSocMedia');
insert into lead_sources (lead, code) values ('Print (Flyer/Poster/Brochure)', 'cd-print');
insert into lead_sources (lead, code) values ('Corporate Sponsor', 'cd-corporateSponsor');
insert into lead_sources (lead, code) values ('Other', 'cd-other');

-- -----------------------------------------------------
-- Table paulsbun_idaydream.roles
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.roles ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.roles (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  role VARCHAR(45) NOT NULL,
  sort_order INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  UNIQUE INDEX role_UNIQUE (role ASC),
  UNIQUE INDEX code_UNIQUE (code ASC),
  UNIQUE INDEX sort_order_unique (sort_order ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into roles (code, role, sort_order) values ('cd-events', 'Events (College Tours, Community Service)', 1);
insert into roles (code, role, sort_order) values ('cd-fundraising', 'Fundraising', 2);
insert into roles (code, role, sort_order) values ('cd-newsletter', 'Newsletter Production (Monthly)', 3);
insert into roles (code, role, sort_order) values ('cd-coordination', 'Volunteer Coordination', 4);
insert into roles (code, role, sort_order) values ('cd-mentoring', 'Mentoring', 5);
insert into roles (code, role, sort_order) values ('cd-other', 'Other', 6);

-- -----------------------------------------------------
-- Table paulsbun_idaydream.shirt_sizes
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.shirt_sizes ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.shirt_sizes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  size VARCHAR(20) NOT NULL,
  sort_order INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  UNIQUE INDEX size_UNIQUE (size ASC),
  UNIQUE INDEX sort_order_unique (sort_order ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into shirt_sizes (size, code, sort_order) values ('Extra Small', 'cd-xs', 1);
insert into shirt_sizes (size, code, sort_order) values ('Small', 'cd-small', 2);
insert into shirt_sizes (size, code, sort_order) values ('Medium', 'cd-med', 3);
insert into shirt_sizes (size, code, sort_order) values ('Large', 'cd-large', 4);
insert into shirt_sizes (size, code, sort_order) values ('Extra Large', 'cd-xl', 5);
insert into shirt_sizes (size, code, sort_order) values ('XXL', 'cd-xxl', 6);

-- -----------------------------------------------------
-- Table paulsbun_idaydream.states
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.states ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.states (
  code CHAR(2) NOT NULL,
  name VARCHAR(45) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (code),
  UNIQUE INDEX name_UNIQUE (name ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

insert into states (code, name) values ('AL','Alabama');
insert into states (code, name) values ('AK','Alaska');
insert into states (code, name) values ('AZ','Arizona');
insert into states (code, name) values ('AR','Arkansas');
insert into states (code, name) values ('CA','California');
insert into states (code, name) values ('CO','Colorado');
insert into states (code, name) values ('CT','Connecticut');
insert into states (code, name) values ('DE','Delaware');
insert into states (code, name) values ('DC','District Of Columbia');
insert into states (code, name) values ('FL','Florida');
insert into states (code, name) values ('GA','Georgia');
insert into states (code, name) values ('HI','Hawaii');
insert into states (code, name) values ('ID','Idaho');
insert into states (code, name) values ('IL','Illinois');
insert into states (code, name) values ('IN','Indiana');
insert into states (code, name) values ('IA','Iowa');
insert into states (code, name) values ('KS','Kansas');
insert into states (code, name) values ('KY','Kentucky');
insert into states (code, name) values ('LA','Louisiana');
insert into states (code, name) values ('ME','Maine');
insert into states (code, name) values ('MD','Maryland');
insert into states (code, name) values ('MA','Massachusetts');
insert into states (code, name) values ('MI','Michigan');
insert into states (code, name) values ('MN','Minnesota');
insert into states (code, name) values ('MS','Mississippi');
insert into states (code, name) values ('MO','Missouri');
insert into states (code, name) values ('MT','Montana');
insert into states (code, name) values ('NE','Nebraska');
insert into states (code, name) values ('NV','Nevada');
insert into states (code, name) values ('NH','New Hampshire');
insert into states (code, name) values ('NJ','New Jersey');
insert into states (code, name) values ('NM','New Mexico');
insert into states (code, name) values ('NY','New York');
insert into states (code, name) values ('NC','North Carolina');
insert into states (code, name) values ('ND','North Dakota');
insert into states (code, name) values ('OH','Ohio');
insert into states (code, name) values ('OK','Oklahoma');
insert into states (code, name) values ('OR','Oregon');
insert into states (code, name) values ('PA','Pennsylvania');
insert into states (code, name) values ('RI','Rhode Island');
insert into states (code, name) values ('SC','South Carolina');
insert into states (code, name) values ('SD','South Dakota');
insert into states (code, name) values ('TN','Tennessee');
insert into states (code, name) values ('TX','Texas');
insert into states (code, name) values ('UT','Utah');
insert into states (code, name) values ('VT','Vermont');
insert into states (code, name) values ('VA','Virginia');
insert into states (code, name) values ('WA','Washington');
insert into states (code, name) values ('WV','West Virginia');
insert into states (code, name) values ('WI','Wisconsin');
insert into states (code, name) values ('WY','Wyoming');

-- -----------------------------------------------------
-- Table paulsbun_idaydream.volunteers
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.volunteers ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.volunteers (
  id INT(11) NOT NULL AUTO_INCREMENT,
  active TINYINT(4) NOT NULL DEFAULT '1',
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  home_phone VARCHAR(20) NOT NULL,
  email VARCHAR(45) NOT NULL,
  add_to_mailing_list TINYINT(4) NOT NULL,
  address1 VARCHAR(80) NOT NULL,
  address2 VARCHAR(80) NULL DEFAULT NULL,
  policy_agreement TINYINT(4) NULL DEFAULT NULL,
  city VARCHAR(45) NOT NULL,
  zip_code VARCHAR(20) NOT NULL,
  weekend_availability TINYINT(4) NULL DEFAULT NULL,
  summer_camp_availability TINYINT(4) NULL DEFAULT NULL,
  other_role_text VARCHAR(80) NULL DEFAULT NULL,
  background_check_agreement TINYINT(4) NULL DEFAULT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  shirt_sizes_id INT(11) NOT NULL,
  states_code CHAR(2) NOT NULL,
  lead_sources_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_volunteers_shirt_sizes1_idx (shirt_sizes_id ASC),
  INDEX fk_volunteers_states1_idx (states_code ASC),
  INDEX fk_volunteers_lead_sources1_idx (lead_sources_id ASC),
  CONSTRAINT fk_volunteers_shirt_sizes1
    FOREIGN KEY (shirt_sizes_id)
    REFERENCES paulsbun_idaydream.shirt_sizes (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_volunteers_states1
    FOREIGN KEY (states_code)
    REFERENCES paulsbun_idaydream.states (code)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_volunteers_lead_sources1
    FOREIGN KEY (lead_sources_id)
    REFERENCES paulsbun_idaydream.lead_sources (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table paulsbun_idaydream.volunteer_references
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.volunteer_references ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.volunteer_references (
  id INT(11) NOT NULL AUTO_INCREMENT,
  active TINYINT(4) NULL DEFAULT '1',
  full_name VARCHAR(60) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  email VARCHAR(45) NOT NULL,
  relationship VARCHAR(45) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  volunteers_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_volunteer_references_volunteers1_idx (volunteers_id ASC),
  CONSTRAINT fk_volunteer_references_volunteers1
    FOREIGN KEY (volunteers_id)
    REFERENCES paulsbun_idaydream.volunteers (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table paulsbun_idaydream.volunteer_roles
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.volunteer_roles ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.volunteer_roles (
  id INT(11) NOT NULL AUTO_INCREMENT,
  volunteer_id INT(11) NOT NULL,
  active TINYINT(4) NOT NULL DEFAULT '1',
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  volunteers_id INT(11) NOT NULL,
  roles_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  INDEX fk_volunteer_roles_volunteers1_idx (volunteers_id ASC),
  INDEX fk_volunteer_roles_roles1_idx (roles_id ASC),
  CONSTRAINT fk_volunteer_roles_volunteers1
    FOREIGN KEY (volunteers_id)
    REFERENCES paulsbun_idaydream.volunteers (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_volunteer_roles_roles1
    FOREIGN KEY (roles_id)
    REFERENCES paulsbun_idaydream.roles (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table paulsbun_idaydream.youth
-- -----------------------------------------------------
DROP TABLE IF EXISTS paulsbun_idaydream.youth ;

CREATE TABLE IF NOT EXISTS paulsbun_idaydream.youth (
  id INT(11) NOT NULL AUTO_INCREMENT,
  active TINYINT(4) NULL DEFAULT '1',
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  home_phone VARCHAR(20) NOT NULL,
  email VARCHAR(45) NOT NULL,
  graduating_class INT(11) NOT NULL,
  college_of_interest VARCHAR(45) NULL DEFAULT NULL,
  food_snacks VARCHAR(80) NULL DEFAULT NULL,
  date_of_birth DATE NOT NULL,
  other_gender_text VARCHAR(80) NULL DEFAULT NULL,
  other_ethnicity_text VARCHAR(80) NULL DEFAULT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  ethnicities_id INT(11) NOT NULL,
  genders_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  INDEX fk_youth_ethnicities1_idx (ethnicities_id ASC),
  INDEX fk_youth_genders1_idx (genders_id ASC),
  CONSTRAINT fk_youth_ethnicities1
    FOREIGN KEY (ethnicities_id)
    REFERENCES paulsbun_idaydream.ethnicities (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_youth_genders1
    FOREIGN KEY (genders_id)
    REFERENCES paulsbun_idaydream.genders (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
