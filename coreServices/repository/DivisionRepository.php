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

class DivisionRepository implements BaseRepository{

    public function deleteOne($entity): bool {

    }

    public function findAll(): iterable {

    }

    public function findOne($entity): \entity\BaseEntity {
        $conn = new \domain\DbConnection();

       	$divisionId = $entity->id;
       	$divisionArea = $entity->area;


        $query = 'select * from sja_division where DIVISION_NAME = "$divisionId" and AREA_NAME = "$divisionArea";';
        /*$result = \mysqli_query($conn->connection, $query);

        $divisionSJA = new \entity\Division();
        if (\mysqli_num_rows($result) == 1) {
          $row = \mysqli_fetch_assoc($result);

          $divisionSJA->id = $row['DIVISION_NAME'];
          $divisionSJA->area = $row['DIVISION_AREA'];

          \mysqli_close($conn->connection);
        }
        return $divisionSJA;*/
        echo $query;
        return array("DIVISION_NAME" => "$divisionId", "DIVISION_AREA" => "$divisionArea");
    }

    public function save($entity): int {



    }

    public function saveAll($entity): iterable {

    }
}


$dr = new DivisionRepository();
$d = new \entity\Division();
$d->id = "Belle Rose";

var_dump($d);
