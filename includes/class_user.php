<?php

/**
 * User Object Class
 * PHP Version 7.*
 * @author Eric Defoix <ericdefoix05@live.fr>
 * Date: 28 April 2019
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

require_once "DbConnection.php";
session_start();


class User
{
    private $username;
    private $firstname;
    private $lastname;
    private $password;
    private $conf_password;
    private $member_id;
    private $division_name;
    private $division_id;
    private $rank_id;
    private $rank_name;
    private $status;
    private $timestamp;
    private $area_id;
    private $area_name;

    public function __construct()
    {
        # Get Argument Array
        $argv = func_get_args();

        switch (func_num_args()) {
            case 3:
                self::__construct1($argv[0], $argv[1], $argv[2]);
                break;
            case 10:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9]);
                break;
        }
    }

    #Actuator!
    public function __get($name)
    {
        return $this->$name;
    }

    #Mutator
    public function __set($prop, $val)
    {
        $this->$prop = $val;
    }

    #Login Constructor
    private function __construct1($username, $password, $exSession)
    {
        $date = date_create();

        $this->username = $username;
        $this->password = $password;

        if ($exSession) {
            $this->timestamp = date_timestamp_get($date) * 2;
        } else {
            $this->timestamp = date_timestamp_get($date);
        }
    }

    # Session Constructor
    private function __construct2($username, $firstname, $lastname, $division_id, $division_name, $rank_id, $rank_name, $area_id, $area_name, $timestamp)
    {
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->division_id = $division_id;
        $this->division_name = $division_name;
        $this->rank_id = $rank_id;
        $this->rank_name = $rank_name;
        $this->timestamp = $timestamp;
        $this->area_id = $area_id;
        $this->area_name = $area_name;
    }

    #Login Method
    public function login()
    {
        $conn = new DbConnection();
        $sql = "SELECT admin_user.user_id, admin_user.user_pwd, admin_user.firstTime, sja_member.member_firstname, sja_member.member_lastname, sja_division.division_id, sja_division.division_name, sja_rank.rank_id, sja_rank.rank_name, admin_user.account_status, sja_division.area_id, sja_area.area_name FROM admin_user INNER JOIN sja_member ON admin_user.member_id = sja_member.member_id INNER JOIN sja_division ON sja_member.member_division = sja_division.division_id INNER JOIN sja_rank ON permission = sja_rank.rank_id INNER JOIN sja_area ON sja_division.area_id = sja_area.area_id WHERE admin_user.user_id = '$this->username';";

        $result = mysqli_query($conn->connection, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck == 1) {
            $row = mysqli_fetch_assoc($result);
            mysqli_close($conn->connection);

            if (password_verify($this->password, $row['user_pwd'])) {
                if ($row['account_status'] == 'enabled') {
                    $_SESSION['logged_user'] = new User(
                        $row['user_id'],
                        $row['member_firstname'],
                        $row['member_lastname'],
                        $row['division_id'],
                        $row['division_name'],
                        $row['rank_id'],
                        $row['rank_name'],
                        $row['area_id'],
                        $row['area_name'],
                        $this->timestamp
                    );

                    return 1;
                } else {
                    #Account Disabled or Suspended
                    return 0;
                }
            } else {
                #Wrong Password
                return 2;
            }
        } else {
            #Unknown Credential
            return 3;
        }
    }

    #Logout Method
    public function logout()
    {
        if (isset($_SESSION['logged_user'])) unset($_SESSION['logged_user']);
        return !isset($_SESSION['logged_user']);
    }

    #Extend User Session Method
    public function renewTimestamp()
    {
        $date = date_create();
        $this->timestamp = date_timestamp_get($date);
    }

    public function toJson()
    {
        return json_encode(
            [
                "user_id" => $this->username,
                "firstname" => $this->firstname,
                "lastname" => $this->lastname,
                "division" => [
                    "id" => $this->division_id,
                    "name" => $this->division_name
                ],
                "rank" => [
                    "id" => $this->rank_id,
                    "name" => $this->rank_name
                ],
                "area" => [
                    "id" => $this->area_id,
                    "name" => $this->area_name
                ],
                "timestamp" => $this->timestamp
            ]
        );
    }
}
