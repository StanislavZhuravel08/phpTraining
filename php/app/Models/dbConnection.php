<?php

namespace Stas\Models;

use PDO;

class dbConnection
{

    /**
     * Associative array of Database parameters
     * @var array $connectionParams
     */
    private static $connectionParams = [
        "serverName"   => 'mysql:host=localhost;',
        "databaseName" => 'dbname=dvTraining',
        "userName"     => 'ahrrhy',
        "userPassword" => 'ArO15999'
    ];

    /**
     * Associative array of queries to Database
     * @var array  $queriesList
     */

    private static $queriesList = [
        "feesByAge"         => "SELECT CONCAT(a.first_name,' ', a.last_name) AS 'full_name', SUM(p.gonorar) AS 'fees_summary' 
                                FROM actors AS a JOIN payments AS p ON p.actor_id=a.actor_id 
                                WHERE TIMESTAMPDIFF(YEAR,a.dob,curdate()) BETWEEN :from_age AND :to_age GROUP BY a.actor_id;",
        "actorsByStudios"   => "SELECT s.name AS 'studios name', CONCAT(a.first_name,' ', a.last_name) AS 'full name',
                                COUNT(DISTINCT f.film_id) AS 'films quantity' 
                                FROM studios AS s JOIN films AS f ON f.studio_id=s.studio_id AND s.studio_id=1 
                                JOIN payments AS p ON p.film_id=f.film_id 
                                JOIN actors AS a ON a.actor_id=p.actor_id GROUP BY a.actor_id;",
        "namesakes"   => "SELECT CONCAT(a.first_name, ' ', b.last_name) AS 'full name' 
                                FROM actors AS a INNER JOIN actors AS b ON a.actor_id=b.actor_id 
                                GROUP BY b.last_name HAVING COUNT(a.last_name)=1;",
        "actorsByLastYears" => "SELECT s.name AS 'Studios name', COUNT(DISTINCT f.film_id) AS 'Films quantity', 
                                COUNT(DISTINCT p.payment_id) AS 'Gonorars quantity', SUM(p.gonorar) AS 'Gonorars summary', 
                                AVG(p.gonorar) AS 'Avarage gonorar' 
                                FROM studios AS s JOIN films AS f ON f.studio_id=s.studio_id AND f.year >= DATE(NOW())+ INTERVAL -10 YEAR 
                                JOIN payments AS p ON p.film_id=f.film_id 
                                JOIN actors AS a ON a.actor_id=p.actor_id AND a.actor_id=1 
                                GROUP BY s.name ORDER BY AVG(p.gonorar) DESC;"
    ];

    /**
     * @var PDO $connection
     */
    private static $connection;

    /**
     * Connect to Database
     * @return PDO
     */
    private function getConnection()
    {
        if (null === self::$connection) {
            // creating connection to database
            self::$connection = new PDO(
                self::$connectionParams['serverName'] . self::$connectionParams['databaseName'],
                self::$connectionParams['userName'],
                self::$connectionParams['userPassword']
            );
        }
        return self::$connection;
    }



    /**
     * Select query by its name as $key in self::$queriesList
     *
     * @param $queryName
     * @return mixed
     */
    private function selectQuery($queryName)
    {
        // select query taking it's name from front-end request
        return self::$queriesList[$queryName];
    }

    /**
     * Make PDO statement and send it to Database
     * Returns Database request in JSON string
     *
     * @param $queryName
     * @param $params
     * @return array
     */
    public function getQueryResult($queryName, $params)
    {
        // get needed query
        $query = self::selectQuery($queryName);

        // prepare sql statement which will be used with different params and send it to database
        // returns statement object

        $statement = $this->getConnection()->prepare($query);

        foreach ($params as $name => $value) {

            // setting custom params to statement
            $name = ':' . $name;

            $statement->bindValue(
                $name,
                $value
            );
        }

        // executing a prepared statement
        // returns true or false

        $statement->execute();

        // returns an array containing all of the result set rows
        // PDO::FETCH_ASSOC returns result as associative array
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
