<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 27.06.18
 * Time: 9:00
 */
//last element of $_POST is form id
//query names are same as form id


$queryName =array_pop($_POST);
$queryData = $_POST;



include 'dbConnection.php';

// this data will come from front-end

$queryBuilder = new dbConnection();
$msg = $queryBuilder->getQueryResult($queryName, $queryData);
echo $msg;
