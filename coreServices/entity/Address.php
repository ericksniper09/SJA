<?php

namespace entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Address
 *
 * @author ericd
 */

include_once 'BaseEntity.php';

class Address implements BaseEntity {
    
    /*
     * @Not-Null
     * @primary key
     * Integer
     */
    private $id;
    
    /*
     * @Not-Null
     * @compound key element
     * String
     */
    private $houseNo;
    
    /*
     * @Not-Null
     * @compound key element
     * String
     */
    private $street;
    
    /*
     * @Not-Null
     * @compound key element
     * String
     */
    private $city;
    
    /*
     * @Not-Null
     * @compound key element
     * String
     */
    private $state;
    
    /*
     * @Not-Null
     * @compound key element
     * String
     */
    private $country;
    
    /*
     * Allow-Null
     * String
     */
    private $postalCode;
    
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
        return "$this->houseNo, $this->street, $this->city, $this->state, $this->country, $this->postalCode";
    }
}
