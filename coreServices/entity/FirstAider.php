<?php

namespace entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FirstAider
 *
 * @author ericd
 */

include_once 'BaseEntity.php';
include_once 'Member.php';
include_once '../enums/Rank.php';
include_once 'Division.php';
include_once '../enums/FirstAiderStatut.php';
include_once 'User.php';

class FirstAider implements BaseEntity {
    
    /*
     * @Not-Null
     * @primary key
     * Integer
     */
    private $id;
    
    /*
     * @Not-Null
     * @One-to-one
     * @ForeingKey -> Member Table: memberId;
     * String
     */
    private $memberId;
    
    /*
     * @Not-Null
     * @Enum Rank
     */
    private $rank;
    
    /*
     * @Not-Null
     * @One-to-one
     * @ForeingKey -> Division Table: divisionId;
     * Division / Integer
     */
    private $division;
    
    /*
     * @Not-Null
     * @Enum FirstAiderStatut
     */
    private $statut;
    
    /*
     * @Not-Null
     * Date
     */
    private $dateVersionStatut;
    
    /*
     * @Not-Null
     * Date
     */
    private $dateEnrollment;
    
     /*
     * @Not-Null
     * @Many-to-one
     * @ForeingKey -> Admin Table: adminId;
     * String
     */
    private $createdBy;
    
     /*
     * @Allow-Null
     * @Many-to-one
     * @ForeingKey -> Admin Table: adminId;
     * String
     */
    private $validatedBy;
    
     /*
     * @Allow-Null
     * @Many-to-one
     * @ForeingKey -> Admin Table: adminId;
     * String
     */
    private $modifiedby;
    
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
        return "$this->memberId, $this->rank, $this->division, $this->statut, $this->dateVersionStatut, "
            . "$this->dateEnrollment, $this->createdBy, $this->validatedBy, $this->modifiedby";
    }
}