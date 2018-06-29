<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 27.06.18
 * Time: 9:00
 */

include 'dbConnection.php';

// this data will come from front-end

$data = 'ageFrom=50&ageTo=50&formId=feesByAge';



$queryParams = [
    ':from_age' => 40,
    ':to_age'   => 60
];
// this data will come from front-end

$queryBuilder = new dbConnection();

$queryBuilder->getParams($data);

//$queryBuilder->showResultData($query, $queryParams);
