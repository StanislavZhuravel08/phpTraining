<?php
/**
 * Created by PhpStorm.
 * User: ahrrhy
 * Date: 27.06.18
 * Time: 3:53
 */

$serverName = 'localhost';
$userName = 'ahrrhy';
$userPassword = 'ArO15999';

class GetQuery
{
    public $connection;

    public function dbConnection($serverName, $userName, $userPassword) {
        $this->connection = new mysqli($serverName, $userName, $userPassword);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        return $this->connection;
    }
}

$myQuery = new GetQuery();
$myQuery->dbConnection($serverName, $userName, $userPassword);
