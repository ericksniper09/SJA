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
include_once '../domain/DbConnection.php';

interface BaseRepository {
    
    /*
     * @method void save(\entity\BaseEntity $AnyEntity) return int;
     * Save Entity to Table
     */
    public function save(\entity\BaseEntity $entity): int;
    
     /*
     * @method void saveAll(\entity\BaseEntity[] $AnyEntity) return int;
     * Save Entity to Table
     */
    public function saveAll($entity): int;
    
     /*
     * @method void findOne(\entity\BaseEntity $AnyEntity) return \entity\BaseEntity;
     * Find specific entity from table
     */
    public function findOne(\entity\BaseEntity $entity): \entity\BaseEntity;
    
    /*
     * @method void findAll(\entity\BaseEntity[] $AnyEntity) return \entity\BaseEntity[];
     * Find All entity from table
     */
    public function findAll(): iterable;
    
    /*
     * @method void delete(\entity\BaseEntity $AnyEntity) return boolean;
     * delete one entity from table
     */
    public function deleteOne(\entity\BaseEntity $entity): bool;
}
