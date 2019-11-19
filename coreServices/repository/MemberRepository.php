<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace repository;

/**
 * Description of MemberRepository
 *
 * @author ericd
 */

include_once 'BaseRepository.php';
include_once '../entity/Member.php';
include_once 'AddressRepository.php';
include_once 'UserRepository.php';

#Mappers
include_once '../mapper/MemberMapper.php';

class MemberRepository implements BaseRepository{
    
    private $conn;
    private $memberMapper;
    private $addressRepository;
    private $userRepository;
    
    public function __construct() {
        $this->conn = new \domain\DbConnection();
        $this->memberMapper = new \mapper\MemberMapper();
        $this->addressRepository = new \repository\AddressRepository();
        $this->userRepository = new \repository\UserRepository();
    }
       
    public function deleteOne(\entity\BaseEntity $entity): bool {
        /**
         * Method not to Be Implemented!
         * Members Once in DB will not be Deleted!
         */
        return false;
    }

    public function findAll(): iterable {
        
    }

    public function findOne(\entity\BaseEntity $member): \entity\BaseEntity {
        $member_new = new \entity\Member;
        
        $query = "select * from sja_member where MEMBER_NIC = '$member->id' or ("
                . "MEMBER_FIRST_NAME = '$member->firstname' and "
                . "MEMBER_LAST_NAME = '$member->lastname' and MEMBER_DOB = '$member->dob');";
        
        $result = mysqli_query($this->conn->connection, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $member_new = $this->memberMapper->toMember($row);
            
            $address = $this->addressRepository->findById($row['MEMBER_ADDRESS']);
            $member_new->address = $address;
        }
        
        mysqli_close($this->conn->connection);
        return $member_new;
    }

    public function save(\entity\BaseEntity $member): int {
        
        $existing_member = $this->findById($member->id);
        $user = $this->userRepository->findById($member->createdBy);
        $address = $this->addressRepository->findById($member->address);
        
        $result = -1;
        if ($existing_member == null && $user != null && $address != null) {
            
            $query = "insert into sja_member values ('$member->id', '$member->firstname', "
                    . "'$member->middlename', '$member->maidenName', '$member->lastname', "
                    . "'$member->dob', '$member->email', '$member->homePhone', '$member->mobilePhone', "
                    . "'$member->address', '$member->gender', '$member->image', '$member->occupation', "
                    . "'$member->dateJoined', '$member->createdBy');";
            $result = mysqli_query($this->conn->connection, $query);
        }        
        
        mysqli_close($this->conn->connection);
        return $result;
    }

    public function saveAll($entity): int {
        
    }
    
    public function findById($memberId): ?\entity\BaseEntity {        
        $query = "select * from sja_member where MEMBER_NIC = '$memberId';";
        $result = mysqli_query($this->conn->connection, $query);
        
        $member = null;
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $member = $this->memberMapper->toMember($row);         
            $member->address = $this->addressRepository->findById($row['MEMBER_ADDRESS']);
        }
        
        mysqli_close($this->conn->connection);
        return $member;
    }
}

$mr = new MemberRepository();
$m = new \entity\Member();

$m->id = "342adsfasafr3a";
$m->firstname = "afasdfadsf";
$m->middlename = "sdafd";
$m->maidenName = 'sdfadfaadsfa';
$m->lastname = "adsfadsfa";
$m->dob = '2019-10-2';
$m->email = "adsfa@sdasd.com";
$m->homePhone = '1222341';
$m->mobilePhone = "1231242";
$m->address = 1;
$m->gender = \enumerations\Gender::SEX_M;
$m->occupation = \enumerations\Occupation::OCC_EMPLOYED;
$m->dateJoined = '2019-4-1';
$m->createdBy = 'root';

echo $mr->findById("342adsfasafr3a");


