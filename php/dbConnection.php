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
     * @var array  $queriesList
     */

    // stores queries list

    private static $queriesList = [
        "feesByAge"         => "SELECT CONCAT(a.first_name,' ', a.last_name) AS 'full name', SUM(p.gonorar) AS 'fees summary' 
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

    private function getQueryName($requestData)
    {

        $findStr = 'formId=';
        $strPos = strpos($requestData, $findStr) + strlen($findStr);

        return $queryName = substr($requestData, $strPos);
    }

    public function getParams($requestData)
    {
        $findStr = '&formId=';
        $strPos = strpos($requestData, $findStr);
        $paramStr = substr($requestData,0, $strPos);
        $param = explode('&', $paramStr);
        print_r($param);
    }

    /**
     * @param $queryName
     * @return mixed
     */
    private function selectQuery($queryName)
    {
        // select query taking it's name from front-end request
        return self::$queriesList[$queryName];
    }

    /**
     * @param $queryName
     * @param array $params
     * @return array
     */
    public function getQueryResult($queryName, array $params = [])
    {
        // get needed query
        $query = self::selectQuery($queryName);

        // prepare sql statement which will be used with different params and send it to database
        // returns statement object

        $statement = $this->getConnection()->prepare($query);

        foreach ($params as $name => $value) {

            // setting custom params to statement

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

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $queryName
     * @param $params
     */
    public function showResultData($queryName, $params)
    {
        $data = $this->getQueryResult($queryName, $params);

        foreach ($data as $hasRow => $row) {
            foreach ($row as $field => $value) {
                echo "$field: $value \n";
            }
        }
    }
}
