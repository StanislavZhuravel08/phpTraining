<?php
/**
 * Created by PhpStorm.
 * User: ahrrhy
 * Date: 27.06.18
 * Time: 3:53
 */


class dbConnection
{

    /**
     * @var array $connectionParams
     */
    private static $connectionParams = [
        "serverName"   => 'mysql:host=localhost;',
        "databaseName" => 'dbname=dvTraining',
        "userName"     => 'ahrrhy',
        "userPassword" => 'ArO15999'
    ];

    /**
     * @var PDO $connection
     */
    private static $connection;

    /**
     * @return PDO
     */
    private function getConnection()
    {
        if (null === self::$connection) {
            self::$connection = new PDO(
                self::$connectionParams['serverName'] . self::$connectionParams['databaseName'],
                self::$connectionParams['userName'],
                self::$connectionParams['userPassword']
            );
        }
        return self::$connection;
    }

    /**
     * @param $query
     * @param array $params
     * @return array
     */
    public function getQueryResult($query, array $params = [])
    {
        $statement = $this->getConnection()->prepare($query);

        foreach ($params as $name => $value) {
            $statement->bindValue(
                $name,
                $value
            );
        }

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // this will output received data
    public function showData()
    {

    }
}
