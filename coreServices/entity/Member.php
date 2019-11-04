<?php

namespace entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Member
 * 
 * @author ericd
 */
include_once 'BaseEntity.php';
include_once 'User.php';
include_once 'Address.php';
include_once '../enums/Gender.php';
include_once '../enums/Occupation.php';

class Member implements BaseEntity {
    /*
     * @Not-Null
     * @primary key
     */
    private $id;
    
    /*
     * @Not-Null
     */
    private $firstname;
    
    /*
     * @Allow-Null
     */
    private $middlename;
    
    /*
     * @Allow-Null
     */
    private $maidenName;
    
    /*
     * @Not-Null
     */
    private $lastname;
    
    /*
     * @Not-Null
     */
    private $dob;
    
    /*
     * @Allow-Null
     */
    private $email;
    
    /*
     * @Allow-Null
     */
    private $homePhone;
    
    /*
     * @Allow-Null
     */
    private $mobilePhone;
    
    /*
     * @Not-Null
     * @many-to-one
     * @ForeingKey -> Address Table: addressId;
     */
    private $address;
    
    /*
     * @Not-Null
     * @Enum Gender
     */
    private $gender;
    
    /*
     * @Allow-Null
     */
    private $image;
    
    /*
     * @Not-Null
     * @Enum Occupation
     */
    private $occupation;
    
    /*
     * @Not-Null
     */
    private $dateJoined;
    
    /*
     * @Not-Null
     * @Many-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $createdBy;
    
    /*
     * Inherited
     */
    public function __construct() {
    }
    
    /*
     * Inherited
     */
    public function __get($name) {
        return $this->$name;
    }
    
    /*
     * Inherited
     */
    public function __set($name, $val) {
        $this->$name = $val;
    }
    
    /*
     * Inherited
     */
    public function __toString() {
        return "$this->firstname, $this->middlename, $this->maidenName, $this->lastname, $this->dob, $this->email, "
            . "$this->mobilePhone, $this->homePhone, $this->address, $this->gender, $this->image, $this->occupation, "
            . "$this->dateJoined, $this->createdBy";
    }
}
