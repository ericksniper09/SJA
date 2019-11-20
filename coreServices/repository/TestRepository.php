<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace repository;

use entity\BaseEntity;
use entity\Division;
use enumerations\Area;

/**
 * Description of test
 *
 * @author ericd
 */


include_once 'UserRepository.php';
include_once 'AddressRepository.php';
include_once 'MemberRepository.php';
include_once 'DivisionRepository.php';

include_once '..\entity\Division.php';
include_once '..\entity\Member.php';
include_once '..\entity\User.php';
include_once '..\entity\Address.php';

include_once '..\enums\Area.php';

class TestRepository {

    private $memberRepo;
    private $addressRepo;
    private $userRepo;
    private $divisionRepo;
    public function __construct() {
        $this->divisionRepo = new DivisionRepository();
    }

    #DivisionTest
    public function divisionTest(): void {
        $myDivision = $this::getDivisionSampleData();
        $this->divisionRepo->save($myDivision);

        $myDivision_found = $this->divisionRepo->findOne($myDivision);
        if ($myDivision != $myDivision_found) {
            return;
        }

        $myDivision_foundId = $this->divisionRepo->findById($myDivision::id);
        if ($myDivision != $myDivision_foundId) {
            return;
        }

        echo 'Division Test Passed! <br/>';
    }

    private function getDivisionSampleData(): BaseEntity {
        $division = new Division();
        $division->id = 'Richelieu';
        $division->area = Area::AREA_BR;

        return $division;
    }
}

