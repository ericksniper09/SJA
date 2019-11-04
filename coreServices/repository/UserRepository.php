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
include_once 'MemberRepository.php';

include_once '../entity/User.php';

#Mapper
include_once '../mapper/UserMapper.php';

class UserRepository implements BaseRepository{

    public function deleteOne(\entity\BaseEntity $entity): bool {

    }

    public function findAll(): iterable {

    }

    public function findOne(\entity\BaseEntity $user): \entity\BaseEntity {
        $conn = new \domain\DbConnection();
        $memberRepo = new MemberRepository();
        $userMapper = new \mapper\UserMapper();
        #$member = $user->member;
        
        $query = "select * from admin_user where USER_NAME = '$user->id' or "
                . "MEMBER_ID = '$member->id' limit 1;";
        $result = mysqli_query($conn->connection, $query);
        
        $user = new \entity\User();
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $user = $userMapper->toUser($row);
            
            $user->member = $row['MEMBER_ID'] != null ?
                $memberRepo->findById($row['MEMBER_ID']) : null;
        }
        
        mysqli_close($conn->connection);
        return $user;
    }

    public function save(\entity\BaseEntity $entity): int {
        
    }

    public function saveAll($entity): int {

    }
    
    public function findById(string $userId): ?\entity\BaseEntity {
        $conn = new \domain\DbConnection();
        $memberRepo = new MemberRepository();
        $userMapper = new \mapper\UserMapper();
        
        $query = "select * from admin_user where USER_NAME = '$userId';";
        $result = mysqli_query($conn->connection, $query);
        
        $user = null;
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $user = $userMapper->toUser($row);
            
            $user->member = $row['MEMBER_ID'] != null ?
                $memberRepo->findById($row['MEMBER_ID']) : null;
        }
        
        mysqli_close($conn->connection);
        return $user;
    }
}