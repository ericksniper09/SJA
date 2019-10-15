<?php

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

include 'BusinessEntity.php';
include 'Member.php';
include '../enums/Rank.php';
include 'Division.php';
include '../enums/FirstAiderStatut.php';
include 'User.php';

class FirstAider extends BusinessEntity {
    
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
     * @One-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $createdBy;
    
     /*
     * @Allow-Null
     * @One-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $validatedBy;
    
     /*
     * @Allow-Null
     * @One-to-one
     * @ForeingKey -> Admin Table: adminId;
     */
    private $modifiedby;
    
    /*
     * Inherited
     */
    public function __toString() {
        
    }

}
