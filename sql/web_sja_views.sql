drop view if exists valid_members;
drop view if exists valid_first_aiders;

-- Actual First Aiders
create view valid_first_aiders as select
sja_member.MEMBER_FIRST_NAME, sja_member.MEMBER_MIDDLE_NAME, sja_member.MEMBER_LAST_NAME, sja_member.MEMBER_NIC,
 sja_member.MEMBER_DOB, sja_member.MEMBER_EMAIL, sja_member.MEMBER_HOME_PHONE, sja_member.MEMBER_MOBILE_PHONE,
 sja_member.MEMBER_GENDER, sja_member.MEMBER_OCCUPATION, sja_member.MEMBER_DATE_JOINED, sja_member.MEMBER_IMAGE,
concat(
	sja_address.ADDRESS_HOUSE_NO, ', ',
	 sja_address.ADDRESS_STREET, ', ', 
	 sja_address.ADDRESS_CITY, ', ',
	 sja_address.ADDRESS_STATE, ', ',
	 sja_address.ADDRESS_COUNTRY, ', ',
	 sja_address.ADDRESS_POSTAL_CODE
) as Address, 
sja_first_aider.RANK, sja_first_aider.DIVISION, sja_division.AREA_NAME, sja_first_aider.FIRST_AIDER_STATUS,
sja_first_aider.ENROLLMENT_DATE, sja_certificate.CERTIFICATE_ID, sja_certificate.CERTIFICATE_DATE_ISSUE,
sja_certificate.CERTIFICATE_DATE_EXPIRY, sja_certificate.CERTIFICATE_LEVEL
from sja_first_aider
inner join sja_member
on sja_first_aider.MEMBER_ID = sja_member.MEMBER_NIC
inner join sja_division
on sja_first_aider.DIVISION = sja_division.DIVISION_NAME
inner join sja_address
on sja_address.ADDRESS_ID = sja_member.MEMBER_ADDRESS
inner join sja_certificate
on sja_certificate.MEMBER_ID = sja_first_aider.MEMBER_ID
where (
	year(sja_certificate.CERTIFICATE_DATE_EXPIRY) > year(now()) or (
		year(sja_certificate.CERTIFICATE_DATE_EXPIRY) = year(now()) and 
		month(sja_certificate.CERTIFICATE_DATE_EXPIRY) > month(now())
	) or (
		year(sja_certificate.CERTIFICATE_DATE_EXPIRY) = year(now()) and 
		month(sja_certificate.CERTIFICATE_DATE_EXPIRY) = month(now()) and
		day(sja_certificate.CERTIFICATE_DATE_EXPIRY) > day(now())
	)
);

-- Potential New First Aiders
create view valid_members as select
sja_member.MEMBER_FIRST_NAME, sja_member.MEMBER_MIDDLE_NAME, sja_member.MEMBER_LAST_NAME, sja_member.MEMBER_NIC,
 sja_member.MEMBER_DOB, sja_member.MEMBER_EMAIL, sja_member.MEMBER_HOME_PHONE, sja_member.MEMBER_MOBILE_PHONE,
 sja_member.MEMBER_GENDER, sja_member.MEMBER_OCCUPATION, sja_member.MEMBER_DATE_JOINED, sja_member.MEMBER_IMAGE,
concat(
	sja_address.ADDRESS_HOUSE_NO, ', ',
	 sja_address.ADDRESS_STREET, ', ', 
	 sja_address.ADDRESS_CITY, ', ',
	 sja_address.ADDRESS_STATE, ', ',
	 sja_address.ADDRESS_COUNTRY, ', ',
	 sja_address.ADDRESS_POSTAL_CODE
) as Address, 
sja_certificate.CERTIFICATE_ID, sja_certificate.CERTIFICATE_DATE_ISSUE, sja_certificate.CERTIFICATE_DATE_EXPIRY,
sja_certificate.CERTIFICATE_LEVEL
from sja_member
inner join sja_address
on sja_address.ADDRESS_ID = sja_member.MEMBER_ADDRESS
inner join sja_certificate
on sja_certificate.MEMBER_ID = sja_member.MEMBER_NIC
where (
	(
		year(sja_certificate.CERTIFICATE_DATE_EXPIRY) > year(now()) or (
		year(sja_certificate.CERTIFICATE_DATE_EXPIRY) = year(now()) and 
		month(sja_certificate.CERTIFICATE_DATE_EXPIRY) > month(now())
		) or (
			year(sja_certificate.CERTIFICATE_DATE_EXPIRY) = year(now()) and 
			month(sja_certificate.CERTIFICATE_DATE_EXPIRY) = month(now()) and
			day(sja_certificate.CERTIFICATE_DATE_EXPIRY) > day(now())
		)
	) and sja_member.MEMBER_NIC not in (
		select MEMBER_ID from sja_first_aider
	)
);