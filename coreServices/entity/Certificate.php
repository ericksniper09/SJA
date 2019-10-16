<?php

namespace entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Certificate
 *
 * @author ericd
 */

include_once 'BaseEntity.php';
include_once '../enums/FirstAidLevel.php';

class Certificate extends BaseEntity {
    
    /*
     * @Not-Null
     * @primary key
     */
    private $id;
    
     /*
     * @Not-Null
     * @Many-to-one
     * @ForeingKey -> Member Table: memberId;
     */
    private $memberId;
    
    /*
     * @Not-Null
     */
    private $dateIssued;
    
    /*
     * @Not-Null
     */
    private $dateExpiry;
    
     /*
     * @Not-Null
     * @Enum FirstAidLevel
     */
    private $level;
    /*
     * Inherited
     */
    public function __toString() {
        
    }

}
