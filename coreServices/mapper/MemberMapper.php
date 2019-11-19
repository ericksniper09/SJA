<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace mapper;

/**
 * Description of MemberMapper
 *
 * @author ericd
 */

include_once 'CoreMapper.php';
include_once '../entity/Member.php';

class MemberMapper implements CoreMapper {
    
    public static function toMember($row): \entity\Member {
        $member = new \entity\Member();
        
        $member->id = $row['MEMBER_NIC'];
        $member->firstname = $row['MEMBER_FIRST_NAME'];
        $member->middlename = $row['MEMBER_MIDDLE_NAME'];
        $member->maidenName = $row['MEMBER_MAIDEN_NAME'];
        $member->lastname = $row['MEMBER_LAST_NAME'];
        $member->dob = $row['MEMBER_DOB'];
        $member->email = $row['MEMBER_EMAIL'];
        $member->homePhone = $row['MEMBER_HOME_PHONE'];
        $member->mobilePhone = $row['MEMBER_MOBILE_PHONE'];
        $member->gender = $row['MEMBER_GENDER'];
        $member->image = $row['MEMBER_IMAGE'];
        $member->occupation = $row['MEMBER_OCCUPATION'];
        $member->dateJoined = $row['MEMBER_DATE_JOINED'];
        $member->createdBy = $row['CREATED_BY'];
        
        return $member;
    }
}
