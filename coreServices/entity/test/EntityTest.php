<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entityTest;

/**
 * Description of EntityTest
 *
 * @author ericd
 */

include_once '../BaseEntity.php';
include_once '../Address.php';
include_once '../Certificate.php';
include_once '../Division.php';
include_once '../FirstAider.php';
include_once '../Member.php';
include_once '../User.php';

include_once '../../enums/FirstAidLevel.php';
include_once '../../enums/Area.php';
include_once '../../enums/Rank.php';
include_once '../../enums/FirstAiderStatut.php';
include_once '../../enums/Gender.php';
include_once '../../enums/Occupation.php';
include_once '../../enums/AdminStatut.php';

class EntityTest {
    /*
     * @Test
     */
    public function addressTest(string $houseNo, string $street, string $city, string $state, string $country, string $postalCode): \entity\BaseEntity {
        $myAddress = new \entity\Address();
        
        $myAddress->houseNo = $houseNo;
        $myAddress->street = $street;
        $myAddress->city = $city;
        $myAddress->state = $state;
        $myAddress->country = $country;
        $myAddress->postalCode = $postalCode;       
        
        return $myAddress;
    }
    
    /*
     * @Test
     */
    public function certificateTest(string $memberId, string $dateIssued, string $dateExpiry, string $level): \entity\BaseEntity {
        $myCertificate = new \entity\Certificate();
        
        $myCertificate->memberId = $memberId;
        $myCertificate->dateIssued = $dateIssued;
        $myCertificate->dateExpiry = $dateExpiry;
        $myCertificate->level = $level;
                
        return $myCertificate;
    }

    /*
     * @Test
     */
    public function divisionTest(string $divisionName, string $divisionArea): \entity\BaseEntity {
        $myDivision = new \entity\Division();
        
        $myDivision->id = $divisionName;
        $myDivision->area = $divisionArea;
                
        return $myDivision;
    }
    
    /*
     * @Test
     */
    public function firstAiderTest(string $memberId, string $rank, string $division, string $statut, string $dateVersionStatut, string $dateEnrollment, string $createdBy, string $validatedBy, string $modifiedBy): \entity\BaseEntity  {
        $myFirstAider = new \entity\FirstAider();
        
        $myFirstAider->memberId = $memberId;
        $myFirstAider->rank = $rank;
        $myFirstAider->division = $division;
        $myFirstAider->statut = $statut;
        $myFirstAider->dateVersionStatut = $dateVersionStatut;
        $myFirstAider->dateEnrollment = $dateEnrollment;
        $myFirstAider->createdBy = $createdBy;
        $myFirstAider->validatedBy = $validatedBy;
        $myFirstAider->modifiedBy = $modifiedBy;
        
        return $myFirstAider;
    }
    
    /*
     * @Test
     */
    public function memberTest($firstname, $middlename, $maidenName, $lastname, $dob, $email, $address, $gender, $image, $mobilePhone, $homePhone, $occupation, $dateJoined, $createdBy): \entity\BaseEntity {
        $myMember = new \entity\Member();
        
        $myMember->firstname = $firstname;
        $myMember->middlename = $middlename;
        $myMember->maidenName = $maidenName;
        $myMember->lastname = $lastname;
        $myMember->dob = $dob;
        $myMember->email = $email;
        $myMember->homePhone = $homePhone;
        $myMember->mobilePhone = $mobilePhone;
        $myMember->address = $address;
        $myMember->gender = $gender;
        $myMember->image = $image;
        $myMember->occupation = $occupation;
        $myMember->dateJoined = $dateJoined;
        $myMember->createdBy = $createdBy;
        
        return $myMember;
    }
    
    /*
     * @Test
     */
    public function userTest($id, $pwd, $memberId, $dateCreated, $accountStatus, $createdBy): \entity\BaseEntity {
        $myUser = new \entity\User();
        
        $myUser->id = $id;
        $myUser->pwd = $pwd;
        $myUser->memberId = $memberId;
        $myUser->accountStatus = $accountStatus;
        $myUser->dateCreated = $dateCreated;
        $myUser->createdBy = $createdBy;
        
        return $myUser;
    }
}

$test = new EntityTest();


$myDivision = $test->divisionTest("Belle Rose", \enumerations\Area::AREA_UPW);
$myAddress = $test->addressTest('501', "Rose Street", 'Richelieu', 'Black River', 'Mauritius', '91302');
$myMember = $test->memberTest('Eric', 'Olivier Gregory', NULL, 'Defoix', '1996-07-09', 'ericdefoix05@live.fr', "($myAddress)", \enumerations\Gender::SEX_M, 'IMAGE', '58567403', '2336946', \enumerations\Occupation::OCC_EMPLOYED, '2016-05-20', "($myAdmin)");
$myAdmin = $test->userTest('USERNAME', 'PASSWORD', "($myMember)", '2019-10-3', \enumerations\AdminStatut::STATUT_ENABLED, "($createdBy)");

echo "<h3><Strong>Address Test</Strong></h3>";
echo "Address Details are: $myAddress"; 

echo "<h3><Strong>Certificate Test</Strong></h3>";
echo 'Certificate Details are: ' . $test->certificateTest("($myMember)", '2019-05-21', '2020-05-21', \enumerations\FirstAidLevel::LEVEL_BASIC);

echo "<h3><Strong>Division Test</Strong></h3>";
echo "Division Details are: $myDivision";

echo "<h3><Strong>First Aider Test</Strong></h3>";
echo 'First Aider Details are: ' . $test->firstAiderTest("($myMember)", \enumerations\Rank::RANK_CP, $myDivision, \enumerations\FirstAiderStatut::STATUT_ACTIVE, '2018-07-30', '2018-07-30', "($myAdmin)", "($myAdmin)", "($myAdmin)");

echo "<h3><Strong>Member Test</Strong></h3>";
echo $myMember;

echo "<h3><Strong>User Test</Strong></h3>";
echo $myAdmin;