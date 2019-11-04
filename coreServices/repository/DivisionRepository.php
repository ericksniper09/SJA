<?php

/**
* Division Repository Class
* PHP Version 7.*
* @author Eric Defoix <ericdefoix05@live.fr>
* Date: 19 October 2019
* @note This program is distributed in the hope that it will be useful - WITHOUT
* ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
* FITNESS FOR A PARTICULAR PURPOSE.
*/

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace repository;

/**
 * Description of DivisionRepository
 *
 * @author ericd
 */

include_once 'BaseRepository.php';
include_once '../entity/Division.php';

#Enums
include_once '../enums/Area.php';

class DivisionRepository implements BaseRepository{

    public function deleteOne(\entity\BaseEntity $division): bool {
        $conn = new \domain\DbConnection();
        
        $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
        $result = mysqli_query($conn->connection, $query);
               
        if (mysqli_num_rows($result) == 1) { #Create new
            $query = "delete from sja_division where DIVISION_NAME = '$division->id';";
            
            $result = mysqli_query($conn->connection, $query);
            mysqli_close($conn->connection);
            
            return $result == 1 ? true : false;
        }
            
        mysqli_close($conn->connection);
        return false;
    }

    public function findAll(): iterable {
        $conn = new \domain\DbConnection();
        $divisions = array();
        
        $query = "select * from sja_division;";
        $result = mysqli_query($conn->connection, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $division = new \entity\Division();            
                $division->id = $row['DIVISION_NAME'];
                $division->area = $row['AREA_NAME'];
                
                array_push($divisions, $division);
            }   
        }
        return $divisions;
    }

    public function findOne(\entity\BaseEntity $division): \entity\BaseEntity {
	$conn = new \domain\DbConnection();
        $myDivision = new \entity\Division();
        
        $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
        $result = mysqli_query($conn->connection, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
                      
            $myDivision->id = $row['DIVISION_NAME'];
            $myDivision->area = $row['AREA_NAME'];
        }
        
        mysqli_close($conn->connection);
        return $myDivision;
    }

    public function save(\entity\BaseEntity $division): int {
        $conn = new \domain\DbConnection();
        
        $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
        $result = mysqli_query($conn->connection, $query);
               
        if (mysqli_num_rows($result) == 0) { #Create new
            $query = "insert into sja_division values ('$division->id', '$division->area');";
            
            $result = mysqli_query($conn->connection, $query);
            mysqli_close($conn->connection);
            return $result == 1 ? $this->findOne($division)->id : 0;
        }
            
        mysqli_close($conn->connection);
        return -1;
    }

    public function saveAll($divisions): int {
        $conn = new \domain\DbConnection();
        $conn->mysqli_startTransaction();
        
        foreach ($divisions as $division) {
            $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
            $result = mysqli_query($conn->connection, $query);
            
            if (mysqli_num_rows($result) == 0) {
                $query = "insert into sja_division values ('$division->id', '$division->area');";
                $result = mysqli_query($conn->connection, $query);   
            } else if (mysqli_num_rows($result) == 1) {
                $conn->mysqli_onFail();
                mysqli_close($conn->connection);
                return -1;
            }
        }
        
        $conn->mysqli_onSuccess();
        mysqli_close($conn->connection); 
        return 1; #Succesful;
    }
    
}
