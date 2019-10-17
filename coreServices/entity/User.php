<?php

namespace entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author ericd
 */

include_once 'BaseEntity.php';
include_once 'Member.php';

include_once '../enums/AdminStatut.php';

class User implements BaseEntity {
    /*
     * @Not-Null
     * @primary key
     */
    private $id;
    
    /*
     * @Not-Null
     * @Hashed/Not-Hashed
     */
    private $pwd;
    
    /*
     * @Allow-Null
     * @One-to-one
     * @ForeingKey -> Member Table: memberId;
     */
    private $memberId;
    
    /*
     * @Not-Null
     * @Enum AdminStatut
     */
    private $accountStatus;
    /*
     * @Allow-Null
     * @Many-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $createdBy;
    
    /*
     * @Not-Null
     */
    private $dateCreated;
    
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
        return "$this->id, $this->pwd, $this->memberId, $this->accountStatus, $this->dateCreated, $this->createdBy";
    }

}
