drop view if exists valid_members;

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

create table admin_status (
	STATUS_NAME varchar(9) not null,
	constraint PK_ADMIN_STATUS_NAME primary key (STATUS_NAME)
);

create table sja_area (
	AREA_NAME varchar(20) not null,
	constraint PK_AREA_NAME primary key (AREA_NAME)
);

create table sja_rank (
	RANK_NAME varchar(30) not null,
	constraint PK_RANK_NAME primary key (RANK_NAME)
);

create table sja_status (
	STATUS_NAME varchar(9) not null,
	constraint PK_SJA_STATUS_NAME primary key (STATUS_NAME)
);

/* Entity Definition */
create table sja_address (
  ADDRESS_ID int auto_increment not null,
  ADDRESS_HOUSE_NO varchar(5) not null,
  ADDRESS_STREET varchar(100) not null,
  ADDRESS_CITY varchar(50) not null,
  ADDRESS_STATE varchar(50) not null,
  ADDRESS_COUNTRY varchar(50) not null,
  ADDRESS_POSTAL_CODE varchar(6) null,
  constraint PK_ADDRESS_ID primary key (ADDRESS_ID),
  constraint AK_ADDRESS unique key (ADDRESS_HOUSE_NO, ADDRESS_STREET, ADDRESS_CITY, ADDRESS_STATE, ADDRESS_COUNTRY)
);

create table sja_division (
	DIVISION_NAME varchar(25) not null,
	AREA_NAME varchar(20) not null,
	constraint PK_DIVISION_NAME primary key (DIVISION_NAME),
	constraint FK_DIVISION_AREA foreign key (AREA_NAME) references sja_area(AREA_NAME)
); 

create table sja_member (
	MEMBER_NIC varchar(14) not null,
	MEMBER_FIRST_NAME varchar(25) not null,
	MEMBER_MIDDLE_NAME varchar(30) null,
	MEMBER_MAIDEN_NAME varchar(25) null,
	MEMBER_LAST_NAME varchar(30) not null,
	MEMBER_DOB date not null,
	MEMBER_EMAIL varchar(30) null,
	MEMBER_HOME_PHONE varchar(7) null,
	MEMBER_MOBILE_PHONE varchar(8) null,
	MEMBER_ADDRESS int not null,
	MEMBER_GENDER varchar(11) not null,
	MEMBER_IMAGE longblob null,
	MEMBER_OCCUPATION varchar(10) not null,
	MEMBER_DATE_JOINED date not null,
	CREATED_BY varchar(6) null,
	constraint PK_MEMBER_ID primary key (MEMBER_NIC),
	constraint FK_MEMBER_ADDRESS_ADDRESS_ID foreign key (MEMBER_ADDRESS) references sja_address(ADDRESS_ID),
	constraint FK_MEMBER_GENDER_GENDER_NAME foreign key (MEMBER_GENDER) references sja_gender(GENDER_NAME),
	constraint FK_MEMBER_OCCUPATION_OCCUPATION_NAME foreign key (MEMBER_OCCUPATION) references sja_occupation(OCCUPATION_NAME)
);

create table sja_certificate (
	CERTIFICATE_ID varchar(20) not null,
	MEMBER_ID varchar(14) not null,
	CERTIFICATE_DATE_ISSUE date not null,
	CERTIFICATE_DATE_EXPIRY date not null,
	CERTIFICATE_LEVEL varchar(19) not null,
	constraint PK_CERTIFICATE_ID primary key (CERTIFICATE_ID),
	constraint FK_CERTIFICATE_MEMBER_ID foreign key (MEMBER_ID) references sja_member(MEMBER_NIC),
	constraint FK_CERTIFICATE_FIRST_AID_LEVEL foreign key (CERTIFICATE_LEVEL) references sja_fa_level(FA_NAME)
);

create table sja_first_aider (
	FIRST_AIDER_ID int not null auto_increment,
	MEMBER_ID varchar(14) not null,
	RANK varchar(30) not null,
	DIVISION varchar(25) not null,
	FIRST_AIDER_STATUS varchar(9) not null,
	VERSION_STATUT_DATE date not null, 
	ENROLLMENT_DATE date not null,
	CREATED_BY varchar(6) null,
	VALIDATED_BY varchar(6) null,
	MODIFIED_BY varchar(6) null,
	constraint PK_FIRST_AIDER_ID primary key (FIRST_AIDER_ID),
	constraint FK_FIRST_AIDER_MEMBER_NIC foreign key (MEMBER_ID) references sja_member(MEMBER_NIC),
	constraint FK_FIRST_AIDER_RANK_NAME foreign key (RANK) references sja_rank(RANK_NAME),
	constraint FK_FIRST_AIDER_DIVISION_NAME foreign key (DIVISION) references sja_division(DIVISION_NAME),
	constraint FK_FIRST_AIDER_STATUS_NAME foreign key (FIRST_AIDER_STATUS) references sja_status(STATUS_NAME)
);

create table admin_user (
	USER_NAME varchar(6) not null,
	USER_PWD text not null,
	MEMBER_ID varchar(14) null,
	ACCOUNT_STATUS varchar(9) not null,
	CREATED_BY varchar(6) null,
	constraint PK_USER_USER_NAME primary key (USER_NAME),
	constraint FK_ADMIN_USER_SJA_MEMBER foreign key (MEMBER_ID) references sja_member(MEMBER_NIC),
	constraint FK_ADMIN_USER_ADMIN_STATUS foreign key (ACCOUNT_STATUS) references admin_status(STATUS_NAME),
	constraint FK_ADMIN_CREATED_BY foreign key (CREATED_BY) references admin_user(USER_NAME)
);

alter table sja_member add 
constraint FK_MEMBER_CREATED_BY foreign key (CREATED_BY) references admin_user(USER_NAME);

alter table sja_first_aider
add constraint FK_FIRST_AIDER_CREATED_BY foreign key (CREATED_BY) references admin_user(USER_NAME),
add constraint FK_FIRST_AIDER_VALIDATED_BY foreign key (VALIDATED_BY) references admin_user(USER_NAME),
add constraint FK_FIRST_AIDER_MODIFIED_BY foreign key (MODIFIED_BY) references admin_user(USER_NAME);

/*
# Duty Table
# Joined Duty && Member Table 
*/