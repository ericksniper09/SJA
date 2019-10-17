<?php

namespace entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Base Entity to Ensure Data Redundancy
 * 
 * @author ericd
 */
abstract class BaseEntity {
    
    /*
     * Object Builder;
     */
    public function __construct() {}
    
    /*
     * toString Method to Print Obj;
     */
    public abstract function __toString();
    
    /*
     * Actuator Method
     * 
     * @param $name
     */
    public function __get($name) {
        return $this->$name;
    }
    
    /*
     * Mutator Method
     * 
     * @param $name
     * @param $val
     */
    public function __set($name, $val) {
        $this->$name = $val;
    }
}