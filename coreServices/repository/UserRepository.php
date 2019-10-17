<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace repository;

/**
 * Description of UserRepository
 *
 * @author ericd
 */

include_once 'BaseRepository.php';
include_once '../domain/DbConnection.php';

class UserRepository implements BaseRepository{

    public function deleteOne($entity): bool {

    }

    public function findAll(): iterable {

    }

    public function findOne($entity): \entity\BaseEntity {
    }

    public function save($entity): int {
        
    }

    public function saveAll($entity): iterable {

    }
}
