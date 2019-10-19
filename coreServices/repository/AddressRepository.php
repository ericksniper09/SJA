<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace repository;

/**
 * Description of AddressRepository
 *
 * @author ericd
 */

include_once 'BaseRepository.php';
include_once '../entity/Address.php';

class AddressRepository implements BaseRepository {
        
    public function deleteOne($address): bool {
        $conn = new \domain\DbConnection();
        
         $query = "select * from sja_address where (ADDRESS_HOUSE_NO = '$address->houseNo' and "
                . "ADDRESS_STREET = '$address->street' and ADDRESS_CITY = '$address->city' and "
                . "ADDRESS_STATE = '$address->state' and ADDRESS_COUNTRY = '$address->country') "
                . "or ADDRESS_ID = '$address->id';";
        $result = mysqli_query($conn->connection, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $addressId = mysqli_fetch_assoc($result)['ADDRESS_ID'];
            $query = "delete from sja_address where ADDRESS_ID = '$addressId';";
            
            $result = mysqli_query($conn->connection, $query) == 1 ? true : false;   
            mysqli_close($conn->connection);
            return $result;
        }
        
        mysqli_close($conn->connection);
        return false;
    }

    public function findAll(): iterable {
        $conn = new \domain\DbConnection();
        $addresses = array();
        
        $query = "select * from sja_address;";
        $result = mysqli_query($conn->connection, $query);
                
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $address = new \entity\Address();
                
                $address->id = $row['ADDRESS_ID'];
                $address->houseNo = $row['ADDRESS_HOUSE_NO'];
                $address->street = $row['ADDRESS_STREET'];
                $address->city = $row['ADDRESS_CITY'];
                $address->state = $row['ADDRESS_STATE'];
                $address->country = $row['ADDRESS_COUNTRY'];
                $address->postalCode = $row['ADDRESS_POSTAL_CODE'];
                
                array_push($addresses, $address);
            }
        }
        return $addresses;
    }

    public function findOne($address): \entity\BaseEntity {
        $conn = new \domain\DbConnection();
        
        $query = "select * from sja_address where (ADDRESS_HOUSE_NO = '$address->houseNo' and "
                . "ADDRESS_STREET = '$address->street' and ADDRESS_CITY = '$address->city' and "
                . "ADDRESS_STATE = '$address->state' and ADDRESS_COUNTRY = '$address->country') "
                . "or ADDRESS_ID = '$address->id';";
        $result = mysqli_query($conn->connection, $query);
        
        $address_found = new \entity\Address();
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $address_found->id = $row['ADDRESS_ID'];
            $address_found->houseNo = $row['ADDRESS_HOUSE_NO'];
            $address_found->street = $row['ADDRESS_STREET'];
            $address_found->city = $row['ADDRESS_CITY'];
            $address_found->state = $row['ADDRESS_STATE'];
            $address_found->country = $row['ADDRESS_COUNTRY'];
            $address_found->postalCode = $row['ADDRESS_POSTAL_CODE'];
        }
        
        return $address_found;
    }

    public function save($address): int {
        $conn = new \domain\DbConnection();
        
        $query = "select * from sja_address where ADDRESS_HOUSE_NO = '$address->houseNo' and "
                . "ADDRESS_STREET = '$address->street' and ADDRESS_CITY = '$address->city' and "
                . "ADDRESS_STATE = '$address->state' and ADDRESS_COUNTRY = '$address->country';";
        $result = mysqli_query($conn->connection, $query);
        
        if (mysqli_num_rows($result) == 0) {
            $query = "insert into sja_address values (NULL, '$address->houseNo', "
                    . "'$address->street', '$address->city', '$address->state', '$address->country', "
                    . "'$address->postalCode');";
            
            $result = mysqli_query($conn->connection, $query);
            mysqli_close($conn->connection);
            return $result == 1 ? $this->findOne($address)->id : 0;     
        }
        
        mysqli_close($conn->connection);
        return -1;        
    }

    public function saveAll($addresses): int {
        $conn = new \domain\DbConnection();
        $conn->mysqli_startTransaction();
        
        foreach ($addresses as $address) {
            $query = "select * from sja_address where ADDRESS_HOUSE_NO = '$address->houseNo' and "
                . "ADDRESS_STREET = '$address->street' and ADDRESS_CITY = '$address->city' and "
                . "ADDRESS_STATE = '$address->state' and ADDRESS_COUNTRY = '$address->country';";
            $result = mysqli_query($conn->connection, $query);
            
            if (mysqli_num_rows($result) === 0) {
                
                $query = "insert into sja_address values (NULL, '$address->houseNo', "
                        . "'$address->street', '$address->city', '$address->state', '$address->country', "
                        . "'$address->postalCode');";
                
                $result = mysqli_query($conn->connection, $query);  
                
            } else if (mysqli_num_rows($result) == 1) {
                
                $conn->mysqli_onFail();
                mysqli_close($conn->connection);
                return -1;
                
            }
        }
        
        $conn->mysqli_onSuccess();
        mysqli_close($conn->connection);
        return 1;     
    }
}