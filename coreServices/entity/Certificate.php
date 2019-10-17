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

class Certificate implements BaseEntity {
    
    /*
     * @Not-Null
     * @primary key
     * Integer
     */
    private $id;
    
     /*
     * @Not-Null
     * @Many-to-one
     * @ForeingKey -> Member Table: memberId;
      * String
     */
    private $memberId;
    
    /*
     * @Not-Null
     * Date
     */
    private $dateIssued;
    
    /*
     * @Not-Null
     * Date
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
        return "$this->memberId, $this->dateIssued, $this->dateExpiry, $this->level";
    }

}
