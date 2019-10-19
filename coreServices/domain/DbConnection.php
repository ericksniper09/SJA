<?php

namespace domain;
# DbConnection Class
# MySql Database Connection
# Author: Eric Defoix
# Date: 21 September 2018

class DbConnection {
    private $connection;
    private $host = "localhost";
    private $username = "WebsiteAdmin";
    private $password = "QNydXMicGtLDxgOM1pXQDg***";
    private $db_name = "web_sja";

    public function __construct() {
        try {
            $this->connection =  mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        } catch (Exception $e) {
            $this->connection = null;
        }
    }

    public function __get($name) {
        if ($name != 'connection') {
            return password_hash($this->$name, PASSWORD_DEFAULT);
        } else {
            return $this->$name;
        }
    }
    
    public function mysqli_onSuccess(): void {
        mysqli_commit($this->connection);
        mysqli_autocommit($this->connection, true);
    }
    
    public function mysqli_onFail(): void {
        mysqli_rollback($this->connection);
        mysqli_autocommit($this->connection, true);
    }
    
    public function mysqli_startTransaction(): void {
        mysqli_begin_transaction();
        mysqli_autocommit($this->connection, false);
    }
}
