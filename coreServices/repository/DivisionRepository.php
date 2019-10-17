<?php

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
include_once '../domain/DbConnection.php';
include_once '../entity/Division.php';

#Enums
include_once '../enums/Area.php';

class DivisionRepository implements BaseRepository{

    public function deleteOne($entity): bool {

    }

    public function findAll(): iterable {

    }

    public function findOne($division): \entity\BaseEntity {
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

    public function save($division): int {
        $conn = new \domain\DbConnection();
        
        $query = "select * from sja_division where DIVISION_NAME = '$division->id';";
        $result = mysqli_query($conn->connection, $query);
        
        if (mysqli_num_rows($result) == 1) { #Update
            $row = mysqli_fetch_assoc($result);
            $division_id = $row['DIVISION_NAME'];
            
            $query = "update sja_division set AREA_NAME = '$division->area' where DIVISION_NAME = '$division_id';";
            
            $result = mysqli_query($conn->connection, $query);
            mysqli_close($conn->connection);
            return $result;
        } else if (mysqli_num_rows($result) == 0) { #Create new
            $query = "insert into sja_division values ('$division->id', '$division->area');";
            
            $result = mysqli_query($conn->connection, $query);
            mysqli_close($conn->connection);
            return $result;
        }
    }

    public function saveAll($entity): iterable {

    }
}

$dr = new DivisionRepository();
$d = new \entity\Division();

$d->id = "Belle Rose";
$d->area = \enumerations\Area::AREA_LPW;

echo $dr->save($d);