<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace repository;

/**
 * Base Repository to Ensure Data Redundancy
 *
 * @author ericd
 */

include_once '../entity/BaseEntity.php';

interface BaseRepository {
    
    /*
     * @method void save(Entity $AnyEntity) return int;
     * Save Entity to Table
     */
    public function save($entity): int;
    
    public function saveAll($entity): iterable;
    
    public function findOne($entity): \entity\BaseEntity;
    
    public function findAll(): iterable;
    
    public function deleteOne($entity): bool;
}
