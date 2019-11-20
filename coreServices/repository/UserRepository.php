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
    
    private $conn;
    private $memberRepository;
    private $userMapper;
    
    public function __construct() {
        $this->conn = new \domain\DbConnection();
        $this->memberRepository = new \repository\MemberRepository();
        $this->userMapper = new \mapper\UserMapper();
    }

    public function deleteOne(\entity\BaseEntity $entity): bool {

    }

    public function findAll(): iterable {

    }

    public function findOne(\entity\BaseEntity $user): \entity\BaseEntity {
        $member = $user->member;
        
        $query = "select * from admin_user where USER_NAME = '$user->id' or "
                . "MEMBER_ID = '$member->id' limit 1;";
        $result = mysqli_query($this->conn->connection, $query);
        
        $userSearch = new \entity\User();
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $userSearch = $this->userMapper->toUser($row);
            
            $userSearch->member = $row['MEMBER_ID'] != null ?
                $this->memberRepository->findById($row['MEMBER_ID']) : null;
        }
        
        mysqli_close($this->conn->connection);
        return $userSearch;
    }

    public function save(\entity\BaseEntity $entity): int {
        
    }

    public function saveAll($entity): int {

    }
    
    public function findById(string $userId): ?\entity\BaseEntity {
        $query = "select * from admin_user where USER_NAME = '$userId';";
        $result = mysqli_query($this->conn->connection, $query);
        
        $user = null;
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $user = $this->userMapper->toUser($row);
            
            $user->member = $row['MEMBER_ID'] != null ?
                $this->memberRepository->findById($row['MEMBER_ID']) : null;
        }
        
        mysqli_close($conn->connection);
        return $user;
    }
}

echo 2;