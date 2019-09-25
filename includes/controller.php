<?php
/**
 * Website Controller
 * PHP Version 7.*
 * @author Eric Defoix <ericdefoix05@live.fr>
 * Date: 28 April 2019
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

require_once 'DbConnection.php';
require_once 'class_user.php';

if (isset($_POST['f'])) {
    switch ($_POST['f']) {

    }
} else if (isset($_GET['f'])) {
    switch ($_GET['f']) {
        case "login":
            login();
            break;
        case "logout":
            echo logout();
            break;
    } 
}


# Login Controller!
function login() {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $extendedSession = false;
    if (isset($_POST['check'])) $extendedSession=true;

    $user = new User($username, $password, $extendedSession);
    
    $response = $user->login();

    if ($response == 1) {
        #success
        header("location: ../content/");
    } else if ($response == 0) {
        #Suspended||Disabled
        header("location: ../#0x5750");
    } else if ($response == 2 || $response == 3) {
        #Wrong Credential
        header("location: ../#0x554E46");
    }
}

# Logout Controller
function logout() {
    $user = new User();
    return $user->logout();
      
}