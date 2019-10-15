<?php

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

include '../enums/AdminStatut.php';
include 'BusinessEntity.php';

class User extends BusinessEntity {
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
     * @One-to-one
     * @ForeingKey -> Member Table: memberId;
     */
    private $createdBy;
    
    /*
     * @Not-Null
     */
    private $dateCreated;
   
    /*
     * Inherited
     */
    public function __toString() {
        
    }

}
