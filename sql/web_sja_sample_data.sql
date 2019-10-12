-- Sample Data!
insert into admin_user (USER_NAME, USER_PWD, ACCOUNT_STATUS) values (
	'ED517',
	'Er7471447',
	'Enabled'
);

insert into sja_address (
	ADDRESS_HOUSE_NO,
	ADDRESS_STREET,
	ADDRESS_CITY,
	ADDRESS_STATE,
	ADDRESS_COUNTRY,
	ADDRESS_POSTAL_CODE
) values (
	'44',
	'Rose Street',
	'Richelieu',
	'Black River',
	'Mauritius',
	'90808'
);

insert into sja_member (
	MEMBER_NIC,
	MEMBER_FIRST_NAME,
	MEMBER_MIDDLE_NAME,
	MEMBER_LAST_NAME,
	MEMBER_DOB,
	MEMBER_EMAIL,
	MEMBER_HOME_PHONE,
	MEMBER_MOBILE_PHONE,
	MEMBER_ADDRESS,
	MEMBER_GENDER,
	MEMBER_OCCUPATION,
	MEMBER_DATE_JOINED
) values (
	'D090796350118F',
	'Eric',
	'Olivier Gregory',
	'Defoix',
	'1996-07-09',
	'ericdefoix05@live.fr',
	'2336964',
	'58567403',
	1,
	'MALE',
	'EMPLOYED',
	'2017-05-31'
);
	