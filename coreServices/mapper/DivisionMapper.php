<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace mapper;

include_once 'CoreMapper.php';
include_once '../entity/Division.php';
/**
 * Description of DivisionMapper
 *
 * @author ericd
 */
class DivisionMapper implements CoreMapper {
    
    public function toDivision($row): \entity\Division {
        $division = new \entity\Division();
        
        $division->id = $row['DIVISION_NAME'];
        $division->area = $row['AREA_NAME'];
        
        return $division;
    }
}
