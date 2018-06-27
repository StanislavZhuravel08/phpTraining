<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 27.06.18
 * Time: 9:00
 */

include 'GetQuery.php';

$query = "SELECT CONCAT(a.first_name,' ', a.last_name) AS 'full name', SUM(p.gonorar) AS 'fees summary' 
    FROM actors AS a JOIN payments AS p ON p.actor_id=a.actor_id 
    WHERE TIMESTAMPDIFF(YEAR,a.dob,curdate()) BETWEEN :from_age AND :to_age GROUP BY a.actor_id;";
$queryParams = [
    ':from_age' => 40,
    ':to_age'   => 60
];


$queryBuilder = new dbConnection();
$result = $queryBuilder->getQueryResult($query, $queryParams);

$current_file_name = basename($_SERVER['PHP_SELF']);
echo $current_file_name."\n";

var_dump($result);