<?php

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
include 'BusinessEntity.php';
include 'User.php';
include 'Address.php';
include '../enums/Gender.php';

class Member extends BusinessEntity {
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
     * @One-to-one
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
    private $datejoined;
    
    /*
     * @Not-Null
     * @One-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $createdBy;
    
    /*
     * Inherited
     */
    public function __toString() {
        
    }
}
