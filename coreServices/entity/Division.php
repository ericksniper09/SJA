<?php

namespace entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Division
 *
 * @author ericd
 */

include_once 'BaseEntity.php';
include_once '../enums/Area.php';

class Division implements BaseEntity {
    /*
     * @Not-Null
     * @primary key
     */
    private $id;

    /*
     * @Not-Null
     * @Enum Area
     */
    private $area;
    
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
        return "$this->id, $this->area";
    }
}
