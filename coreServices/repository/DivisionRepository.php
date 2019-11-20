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

use domain\DbConnection;
use entity\BaseEntity;
use entity\Division;
use mapper\DivisionMapper;

/**
 * Description of DivisionRepository
 *
 * @author ericd
 */

include_once 'BaseRepository.php';
include_once '../entity/Division.php';

#Mapper
include_once '../mapper/DivisionMapper.php';

#Enums
include_once '../enums/Area.php';

class DivisionRepository implements BaseRepository{

    #MySQL Connection Object
    private $conn;

    #DivisionMapper Object
    private $divisionMapper;

    public function __construct() {
        $this->conn = new DbConnection();
        $this->divisionMapper = new DivisionMapper();
    }

    public function deleteOne(BaseEntity $division): bool {
        $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
        $result = mysqli_query($this->conn->connection, $query);
               
        if (mysqli_num_rows($result) == 1) { #Division Found
            $query = "delete from sja_division where DIVISION_NAME = '$division->id';";
            
            $result = mysqli_query($this->conn->connection, $query);
            mysqli_close($this->conn->connection);
            
            return $result == 1 ? true : false;
        }
            
        mysqli_close($this->conn->connection);
        return false;
    }

    public function findAll(): iterable {
        $divisions = array();
        
        $query = "select * from sja_division;";
        $result = mysqli_query($this->conn->connection, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $division = $this->divisionMapper->toDivision($row);
                array_push($divisions, $division);
            }   
        }
        mysqli_close($this->conn->connection);
        return $divisions;
    }

    public function findOne(BaseEntity $division): BaseEntity {
        $myDivision = new Division();
        
        $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
        $result = mysqli_query($this->conn->connection, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $myDivision = $this->divisionMapper->toDivision(mysqli_fetch_assoc($result));
        }

        mysqli_close($this->conn->connection);
        return $myDivision;
    }

    public function save(BaseEntity $division): int {
        $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
        $result = mysqli_query($this->conn->connection, $query);
               
        if (mysqli_num_rows($result) == 0) { #Create new
            $query = "insert into sja_division values ('$division->id', '$division->area');";
            
            $result = mysqli_query($this->conn->connection, $query);
            mysqli_close($this->conn->connection);
            return $result == 1 ? $this->findOne($division)->id : 0;
        }
            
        mysqli_close($this->conn->connection);
        return -1;
    }

    public function saveAll($divisions): int {
        $this->conn->mysqli_startTransaction();
        
        foreach ($divisions as $division) {
            $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
            $result = mysqli_query($this->conn->connection, $query);
            
            if (mysqli_num_rows($result) == 0) {
                $query = "insert into sja_division values ('$division->id', '$division->area');";
                $result = mysqli_query($this->conn->connection, $query);
            } else if (mysqli_num_rows($result) == 1) {
                $this->conn->mysqli_onFail();
                mysqli_close($this->conn->connection);
                return -1;
            }
        }
        
        $this->conn->mysqli_onSuccess();
        mysqli_close($this->conn->connection);
        return 1; #Succesful;
    }
    
    public function findById($divisionId): ?BaseEntity {
        $query = "select * from sja_division where DIVISION_NAME = '$divisionId';";
        $result = mysqli_query($this->conn->connection, $query);
        
        mysqli_close($this->conn->connection);
        return mysqli_num_rows($result) == 1 ? 
            $this->divisionMapper->toDivision(mysqli_fetch_assoc($result)) : null;
    }
}
echo "OK:";