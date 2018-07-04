<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 04.07.18
 * Time: 14:10
 */

namespace Stas\Controllers;

use Stas\Http\Request;
use Stas\Http\Response\AbstractResponse;
use Stas\Http\Response\Json;
use Stas\Models\dbConnection;

class feesByAge extends  \Stas\Http\AbstractController
{

    /**
     * @return AbstractResponse
     */
    public function execute(): AbstractResponse
    {
        $response = new Json();
        $response->setBody($this->dbResult());
        return $response;
    }

    /**
     * @return array
     */
    private function getControllerParameters()
    {
        $request = new Request();
        $parameters = $request->getControllerParameters();
        $parameters = explode('&', $parameters);
        $controllerParameters = [];

        foreach ($parameters as $key) {
            $key = explode('=', $key);
            $controllerParameters[$key[0]] = $key[1];
        }

        return $controllerParameters;
    }

    /**
     * @return array
     */
    private function dbResult()
    {
        $queryName = $this->thisShortName($this);

        $queryParams = $this->getControllerParameters();

        $dbConnection = new dbConnection();
        $msg = $dbConnection->getQueryResult($queryName, $queryParams);
        return $msg;
    }
}