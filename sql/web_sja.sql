drop database if exists web_sja;
create database if not exists web_sja;

use web_sja;

/* Fixed Enums Definitions */
create table sja_gender (
	GENDER_NAME varchar(11) not null,
	constraint PK_GENDER_NAME primary key (GENDER_NAME)
);

create table sja_fa_level (
  FA_NAME varchar(19) not null,
  constraint PK_FA_NAME primary key (FA_NAME)
);

create table sja_occupation (
	OCCUPATION_NAME varchar(10) not null,
	constraint PK_OCCUPATION_NAME primary key (OCCUPATION_NAME)
);

create table admin_statut (
	STATUT_NAME varchar(9) not null,
	constraint PK_STATUT_NAME primary key (STATUT_NAME)
);

create table sja_area (
	AREA_NAME varchar(19) not null,
	constraint PK_AREA_NAME primary key (AREA_NAME)
);

create table sja_rank (
	RANK_NAME varchar(20) not null,
	constraint PK_RANK_NAME primary key (RANK_NAME)
);

/* Entity Definition */
create table sja_address (
  ADDRESS_ID int auto_increment not null,
  ADDRESS_HOUSE_NO varchar(5) not null,
  ADDRESS_STREET varchar(100) not null,
  ADDRESS_CITY varchar(50) not null,
  ADDRESS_STATE varchar(50) not null,
  ADDRESS_COUNTRY varchar(50) not null,
  ADDRESS_POSTAL_CODE text not null,
  constraint PK_ADDRESS_ID primary key (ADDRESS_ID),
  constraint AK_ADDRESS unique key (ADDRESS_HOUSE_NO, ADDRESS_STREET, ADDRESS_CITY, ADDRESS_STATE, ADDRESS_COUNTRY)
);

create table sja_division (
	DIVISION_NAME varchar(25) not null,
	AREA_NAME varchar(19) not null,
	constraint PK_DIVISION_NAME primary key (DIVISION_NAME),
	constraint FK_DIVISION_AREA foreign key (AREA_NAME) references sja_area(AREA_NAME)
); 

/*
# Member Table
# First Aiders Table
# Duty Table
# Joined Duty && Member Table
# Certificate Table
# User Admin Table