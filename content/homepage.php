<?php
require_once "../coreServices/class_user.php";

#Session Management 
#Timestamp->30 minutes
/*
if (isset($_SESSION['logged_user'])) {
    $date = date_create();
    $timestamp = date_timestamp_get($date);

    if ($timestamp - $_SESSION['logged_user']->timestamp > 3600) {
        $user = new User();
        if ($user->logout()) {
            header("location: ../"); #Login Page!
        } else {
            $_SESSION['logged_user']->renewTimestamp();
        }
    }
} else {
    header("location: ../"); #Login Page!
}

$ex = json_decode($_SESSION['logged_user']->toJson());


echo json_encode($ex);

//$_SESSION['logged_user']->logout();

*/