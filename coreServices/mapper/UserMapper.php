<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace mapper;

/**
 * Description of UserMapper
 *
 * @author ericd
 */

include_once 'CoreMapper.php';
include_once '../entity/User.php';

class UserMapper implements CoreMapper{
   
    public function toUser($row): \entity\BaseEntity {
        $user = new \entity\User();
        
        $user->id = $row['USER_NAME'];
        $user->pwd = $row['USER_PWD'];
        $user->accountStatus = $row['ACCOUNT_STATUS'];
        $user->dateCreated = $row['DATE_CREATED'];
        $user->createdBy = $row['CREATED_BY'];
        
        return $user;
    }
}
