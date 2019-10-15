<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ericd
 */

include '../CoreServices.php';
include '../../entity/User.php';
include '../../domain/UserDto.php';

interface UserService extends CoreServices {
    /*
     * Method to Login User
     * 
     * @param $userDto
     */
    
    public function login($userDto);
    
    /*
     * Method to Create New User
     * 
     * @param $UserDto
     */
    public function createNewUser($userDto);
    
    /*
     * Method to Modifiy Exising User
     * 
     * 
     * @param $userDto_existing
     * @param $userDto_new
     */
    public function updateUser($userDto_existing, $userDto_new);
    
    /*
     * Method to Delete a User
     * 
     * @param $userDto
     */
    public function deleteUser($userDto);
    
    /*
     * Method to log a user Out;
     * 
     * @param $userDto
     */
    public function logout($userDto);
}