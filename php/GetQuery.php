<?php
/**
 * Created by PhpStorm.
 * User: ahrrhy
 * Date: 27.06.18
 * Time: 3:53
 */

class GetQuery
{
    public $connectMysql;
    public $queryResult;

    // this method will return new connection to mysql
    public function mysqlConnection($dataArray) {
        $this->connectMysql = new mysqli( $dataArray["serverName"], $dataArray["userName"], $dataArray["userPassword"] );
        return $this->connectMysql;
    }

    // this method will connect to chosen database
    public function dbSelect($dbName) {
        $sql = "USE $dbName ;";
        $this->connectMysql->query($sql);
    }

    // this will send query from front-end
    public function getQueryResult($query) {
        return $this->queryResult = $this->connectMysql->query($query);
    }
}


