//Databases final project table creation queries

CREATE TABLE actor(
	actor_id int(11) unsigned NOT NULL AUTO_INCREMENT,
	fname varchar(45) NOT NULL,
	lname varchar(45) NOT NULL,
	bdate DATE,
	PRIMARY KEY (actor_id)
)ENGINE=InnoDB



CREATE TABLE spouse(
	spouse_id int(11) unsigned NOT NULL AUTO_INCREMENT,
	fname varchar(45) NOT NULL,
	lname varchar(45) NOT NULL,
	bdate DATE,
	PRIMARY KEY (spouse_id)
)ENGINE=InnoDB

CREATE TABLE director(
	director_id int(11) unsigned NOT NULL AUTO_INCREMENT,
	fname varchar(45) NOT NULL,
	lname varchar(45) NOT NULL,
	bdate DATE,
	PRIMARY KEY (director_id)
)ENGINE=InnoDB


CREATE TABLE film(
	film_id int(11) unsigned NOT NULL AUTO_INCREMENT,
	title varchar(45) NOT NULL,
	budget numeric(13,2),
	exp_release DATE,
	PRIMARY KEY (film_id)
)ENGINE=InnoDB

CREATE TABLE religion(
	religion_id int(11) unsigned NOT NULL AUTO_INCREMENT,
	name varchar(45) NOT NULL,
	PRIMARY KEY (religion_id),
	foundingDate DATE
)ENGINE=InnoDB

CREATE TABLE actor_marriage(
	aid int(11) unsigned UNIQUE NOT NULL,
	sid int(11) unsigned UNIQUE NOT NULL, 
	PRIMARY KEY (aid,sid),
	CONSTRAINT FOREIGN KEY (aid) REFERENCES actor (actor_id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY (sid) REFERENCES spouse (spouse_id) ON DELETE CASCADE 
)ENGINE=InnoDB

CREATE TABLE film_actor(
	aid int(11) unsigned NOT NULL,
	fid int(11) unsigned NOT NULL,
	PRIMARY KEY (aid,fid),
	CONSTRAINT FOREIGN KEY (aid) REFERENCES actor (actor_id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY (fid) REFERENCES film (film_id) ON DELETE CASCADE
)ENGINE InnoDB



CREATE TABLE film_director(
	did int(11) unsigned  NOT NULL,
	fid int(11) unsigned UNIQUE NOT NULL,
	PRIMARY KEY (did,fid),
	CONSTRAINT FOREIGN KEY (did) REFERENCES director (director_id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY (fid) REFERENCES film (film_id) ON DELETE CASCADE
)ENGINE InnoDB

CREATE TABLE religion_actor(
	rid int(11) unsigned  NOT NULL,
	aid int(11) unsigned UNIQUE NOT NULL,
	PRIMARY KEY (rid,aid),
	CONSTRAINT FOREIGN KEY (rid) REFERENCES religion (religion_id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY (aid) REFERENCES actor (actor_id) ON DELETE CASCADE
)ENGINE InnoDB

CREATE TABLE religion_spouse(
	rid int(11) unsigned  NOT NULL,
	sid int(11) unsigned UNIQUE NOT NULL,
	PRIMARY KEY (rid,sid),
	CONSTRAINT FOREIGN KEY (rid) REFERENCES religion (religion_id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY (sid) REFERENCES spouse (spouse_id) ON DELETE CASCADE
)ENGINE InnoDB


CREATE TABLE religion_director(
	rid int(11) unsigned  NOT NULL,
	did int(11) unsigned UNIQUE NOT NULL,
	PRIMARY KEY (rid,did),
	CONSTRAINT FOREIGN KEY (rid) REFERENCES religion (religion_id) ON DELETE CASCADE,
	CONSTRAINT FOREIGN KEY (did) REFERENCES director (director_id) ON DELETE CASCADE
)ENGINE InnoDB

Test adding queries
INSERT INTO actor (field1,field2) VALUES (value1, value2)



