<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace repository;

use domain\DbConnection;
use entity\Address;
use entity\BaseEntity;
use mapper\AddressMapper;

/**
 * Description of AddressRepository
 *
 * @author ericd
 */

include_once 'BaseRepository.php';
include_once '../entity/Address.php';

#Mapper
include_once '../mapper/AddressMapper.php';

class AddressRepository implements BaseRepository {

    #MySQL Connection Object
    private $conn;

    #AddressMapper Object
    private $addressMapper;

    public function __construct() {
        $this->conn = new DbConnection();
        $this->addressMapper = new AddressMapper();
    }

    public function deleteOne(BaseEntity $address): bool {
        $query = "select * from sja_address where (ADDRESS_HOUSE_NO = '$address->houseNo' and "
                . "ADDRESS_STREET = '$address->street' and ADDRESS_CITY = '$address->city' and "
                . "ADDRESS_STATE = '$address->state' and ADDRESS_COUNTRY = '$address->country') "
                . "or ADDRESS_ID = '$address->id';";
        $result = mysqli_query($this->conn->connection, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $addressId = mysqli_fetch_assoc($result)['ADDRESS_ID'];
            $query = "delete from sja_address where ADDRESS_ID = '$addressId';";
            
            $result = mysqli_query($this->conn->connection, $query) == 1 ? true : false;
            mysqli_close($this->conn->connection);
            return $result;
        }
        
        mysqli_close($this->conn->connection);
        return false;
    }

    public function findAll(): iterable {
        $addresses = array();
        
        $query = "select * from sja_address;";
        $result = mysqli_query($this->conn->connection, $query);
                
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $address = $this->addressMapper->toAddress($row);
                array_push($addresses, $address);
            }
        }
        mysqli_close($this->conn->connection);
        return $addresses;
    }

    public function findOne(BaseEntity $address): BaseEntity {
        $query = "select * from sja_address where (ADDRESS_HOUSE_NO = '$address->houseNo' and "
                . "ADDRESS_STREET = '$address->street' and ADDRESS_CITY = '$address->city' and "
                . "ADDRESS_STATE = '$address->state' and ADDRESS_COUNTRY = '$address->country') "
                . "or ADDRESS_ID = '$address->id';";
        $result = mysqli_query($this->conn->connection, $query);
        
        $address_found = new Address();
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $address_found = $this->addressMapper->toAddress($row);
        }
        
        return $address_found;
    }

    public function save(BaseEntity $address): int {
        $query = "select * from sja_address where ADDRESS_HOUSE_NO = '$address->houseNo' and "
                . "ADDRESS_STREET = '$address->street' and ADDRESS_CITY = '$address->city' and "
                . "ADDRESS_STATE = '$address->state' and ADDRESS_COUNTRY = '$address->country';";
        $result = mysqli_query($this->conn->connection, $query);
        
        if (mysqli_num_rows($result) == 0) {
            $query = "insert into sja_address values (NULL, '$address->houseNo', "
                    . "'$address->street', '$address->city', '$address->state', '$address->country', "
                    . "'$address->postalCode');";
            
            $result = mysqli_query($this->conn->connection, $query);
            mysqli_close($this->conn->connection);
            return $result == 1 ? $this->findOne($address)->id : 0;     
        }
        
        mysqli_close($this->conn->connection);
        return -1;        
    }

    public function saveAll($addresses): int {
        $this->conn->mysqli_startTransaction();
        
        foreach ($addresses as $address) {
            $query = "select * from sja_address where ADDRESS_HOUSE_NO = '$address->houseNo' and "
                . "ADDRESS_STREET = '$address->street' and ADDRESS_CITY = '$address->city' and "
                . "ADDRESS_STATE = '$address->state' and ADDRESS_COUNTRY = '$address->country';";
            $result = mysqli_query($this->conn->connection, $query);
            
            if (mysqli_num_rows($result) === 0) {
                
                $query = "insert into sja_address values (NULL, '$address->houseNo', "
                        . "'$address->street', '$address->city', '$address->state', '$address->country', "
                        . "'$address->postalCode');";
                
                $result = mysqli_query($this->conn->connection, $query);
                
            } else if (mysqli_num_rows($result) == 1) {
                
                $this->conn->mysqli_onFail();
                mysqli_close($this->conn->connection);
                return -1;
                
            }
        }
        
        $this->conn->mysqli_onSuccess();
        mysqli_close($this->conn->connection);
        return 1;     
    }
    
    public function findById(int $addressId): ?BaseEntity {
        $query = "select * from sja_address where ADDRESS_ID = '$addressId';";
        $result = mysqli_query($this->conn->connection, $query);
        
        return mysqli_num_rows($result) == 1 ? 
            $this->addressMapper->toAddress(mysqli_fetch_assoc($result)) : null;
    }
}
echo "OK:";