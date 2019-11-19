<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace mapper;

/**
 * Description of AddressMapper
 *
 * @author ericd
 */

include_once 'CoreMapper.php';
include_once '../entity/Address.php';

class AddressMapper implements CoreMapper {
   
    public static function toAddress($row): \entity\BaseEntity {
        $address = new \entity\Address();
                
        $address->id = $row['ADDRESS_ID'];
        $address->houseNo = $row['ADDRESS_HOUSE_NO'];
        $address->street = $row['ADDRESS_STREET'];
        $address->city = $row['ADDRESS_CITY'];
        $address->state = $row['ADDRESS_STATE'];
        $address->country = $row['ADDRESS_COUNTRY'];
        $address->postalCode = $row['ADDRESS_POSTAL_CODE'];
        
        return $address;
    }
}
