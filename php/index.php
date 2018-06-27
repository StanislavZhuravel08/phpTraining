<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 27.06.18
 * Time: 9:00
 */

include 'GetQuery.php';

// this stores server and user names with password for connection to mysql
$dbName = 'dvTraining';
$query = "SELECT * FROM actors";

$connectionData = array(
    "serverName" => 'localhost',
    "userName" => 'ahrrhy',
    "userPassword" => 'ArO15999');

$myQuery = new GetQuery();

// create new connection to mysql
$myQuery->mysqlConnection($connectionData);

// select database
$myQuery->dbSelect($dbName);

// send query and get result
$result = $myQuery->getQueryResult($query.';');

// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<br> id: ". $row["actor_id"]. " - Name: ". $row["first_name"]. " " . $row["last_name"] . "<br>";
}


// close connection after operation
$myQuery->connectMysql->close();

// create new connection to database

