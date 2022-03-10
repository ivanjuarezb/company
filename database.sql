DROP DATABASE dbcompany;
CREATE DATABASE IF NOT EXISTS dbcompany CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

USE dbcompany;

CREATE TABLE tbluser (
    id INT(50) AUTO_INCREMENT NOT NULL,
    name VARCHAR(20),
    surname VARCHAR(40),
    email VARCHAR(30),
    phonenumber VARCHAR(15),
    state INT(1),
    creationdate DATETIME,
    
    CONSTRAINT pk_tbluser_id PRIMARY KEY(id) 
)ENGINE=INNODB;

CREATE TABLE tblcpumodel (
    id INT(50) AUTO_INCREMENT NOT NULL,
    brand VARCHAR(20),
    name VARCHAR(20),
    processortype VARCHAR(20),
    speed INT(10),
    rammemory INT(10),
    
    CONSTRAINT pk_tblcpumodel_id PRIMARY KEY(id) 
)ENGINE=INNODB;

CREATE TABLE tblprintermodel (
    id INT(50) AUTO_INCREMENT NOT NULL,
    brand VARCHAR(20),
    name VARCHAR(20),
    
    CONSTRAINT pk_tblprintermodel_id PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE tblmonitormodel (
    id INT(50) AUTO_INCREMENT NOT NULL,
    brand VARCHAR(20),
    name VARCHAR(20),
    
    CONSTRAINT pk_tblmonitormodel_id PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE tblcpu (
    id INT(50) AUTO_INCREMENT NOT NULL,
    tblcpumodel_id INT(50),
    tbluser_id INT(50),
    serialnumber VARCHAR(40),
    purpose VARCHAR(20),
    state INT(1),
    creationdate DATETIME,
    
    CONSTRAINT pk_tblcpu_id PRIMARY KEY(id),
    CONSTRAINT fk_tblcpu_cpumodelid FOREIGN KEY(tblcpumodel_id) REFERENCES tblcpumodel(id),
    CONSTRAINT fk_tblcpu_userid FOREIGN KEY(tbluser_id) REFERENCES tbluser(id)
)ENGINE=INNODB;

CREATE TABLE tblmonitor (
    id INT(50) AUTO_INCREMENT NOT NULL,
    tblmonitormodel_id INT(50),
    tbluser_id INT(50),
    serialnumber VARCHAR(40),
    state INT(1),
    creationdate DATETIME,
    
    CONSTRAINT pk_tblmonitor_id PRIMARY KEY(id),
    CONSTRAINT fk_tblmonitor_monitormodelid FOREIGN KEY(tblmonitormodel_id) REFERENCES tblmonitormodel(id),
    CONSTRAINT fk_tblmonitor_userid FOREIGN KEY(tbluser_id) REFERENCES tbluser(id)
)ENGINE=INNODB;

CREATE TABLE tblprinter (
    id INT(50) AUTO_INCREMENT NOT NULL,
    tblprintermodel_id INT(50),
    tbluser_id INT(50),
    serialnumber VARCHAR(40),
    state INT(1),
    creationdate DATETIME,
    department VARCHAR(50),
    
    CONSTRAINT pk_tblprinter_id PRIMARY KEY(id),
    CONSTRAINT fk_tblprinter_printermodelid FOREIGN KEY(tblprintermodel_id) REFERENCES tblprintermodel(id),
    CONSTRAINT fk_tblprinter_userid FOREIGN KEY(tbluser_id) REFERENCES tbluser(id)
)ENGINE=INNODB;