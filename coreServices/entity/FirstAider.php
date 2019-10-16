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

class FirstAider extends BaseEntity {
    
    /*
     * @Not-Null
     * @primary key
     */
    private $id;
    
    /*
     * @Not-Null
     * @One-to-one
     * @ForeingKey -> Member Table: memberId;
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
     */
    private $division;
    
    /*
     * @Not-Null
     * @Enum FirstAiderStatut
     */
    private $statut;
    
    /*
     * @Not-Null
     */
    private $dateVersionStatut;
    
    /*
     * @Not-Null
     */
    private $dateEnrollment;
    
     /*
     * @Not-Null
     * @Many-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $createdBy;
    
     /*
     * @Allow-Null
     * @Many-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $validatedBy;
    
     /*
     * @Allow-Null
     * @Many-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $modifiedby;
    
    /*
     * Inherited
     */
    public function __toString() {
        
    }
}
