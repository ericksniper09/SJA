<?php

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

include 'BusinessEntity.php';
class Address extends BusinessEntity {
    /*
     * @Not-Null
     * @primary key
     */
    private $id;
    
    /*
     * @Not-Null
     * @compound key element
     */
    private $houseNo;
    
    /*
     * @Not-Null
     * @compound key element
     */
    private $street;
    
    /*
     * @Not-Null
     * @compound key element
     */
    private $city;
    
    /*
     * @Not-Null
     * @compound key element
     */
    private $state;
    
    /*
     * @Not-Null
     * @compound key element
     */
    private $country;
    
    /*
     * Allow-Null
     */
    private $postalCode;
    
    /*
     * Inherited
     */
    public function __toString() {
        
    }

}
