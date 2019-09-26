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
  ADDRESS_POSTAL_CODE text null,
  constraint PK_ADDRESS_ID primary key (ADDRESS_ID),
  constraint AK_ADDRESS unique key (ADDRESS_HOUSE_NO, ADDRESS_STREET, ADDRESS_CITY, ADDRESS_STATE, ADDRESS_COUNTRY)
);

create table sja_division (
	DIVISION_NAME varchar(25) not null,
	AREA_NAME varchar(19) not null,
	constraint PK_DIVISION_NAME primary key (DIVISION_NAME),
	constraint FK_DIVISION_AREA foreign key (AREA_NAME) references sja_area(AREA_NAME)
); 

create table sja_member (
	MEMBER_NIC varchar(14) not null,
	MEMBER_FIRST_NAME text not null,
	MEMBER_MIDDLE_NAME text null,
	MEMBER_MAIDEN_NAME text null,
	MEMBER_LAST_NAME text not null,
	MEMBER_DOB date not null,
	MEMBER_EMAIL text null,
	MEMBER_HOME_PHONE text null,
	MEMBER_MOBILE_PHONE text null,
	MEMBER_ADDRESS int not null,
	MEMBER_GENDER varchar(11) not null,
	MEMBER_DATE_JOINED date not null,
	MEMBER_IMAGE longblob null,
	constraint PK_MEMBER_ID primary key (MEMBER_NIC),
	constraint FK_MEMBER_ADDRESS_ADDRESS_ID foreign key (MEMBER_ADDRESS) references sja_address(ADDRESS_ID),
	constraint FK_MEMBER_GENDER_GENDER_NAME foreign key (MEMBER_GENDER) references sja_gender(GENDER_NAME)
);

create table sja_certificate (
	CERTIFICATE_ID varchar(20) not null,
	MEMBER_ID varchar(14) not null,
	CERTIFICATE_DATE_ISSUE date not null,
	CERTIFICATE_DATE_EXPIRY date not null,
	CERTIFICATE_LEVEL int not null,
	constraint PK_CERTIFICATE_ID primary key (CERTIFICATE_ID),
	constraint FK_CERTIFICATE_MEMBER_ID foreign key (MEMBER_ID) references sja_member(MEMBER_NIC),
	constraint FX_CERTIFICATE_FIRST_AID_LEVEL foreign key (CERTIFICATE_LEVEL) references sja_fa_level(FA_NAME)
);

/*
# Member Table *
# First Aiders Table 
# Duty Table
# Joined Duty && Member Table
# Certificate Table *
# User Admin Table