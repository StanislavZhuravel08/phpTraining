<?php

namespace Stas\Http;

class Request
{
    const DEFAULT_CONTROLLER = 'index';

    /**
     * @return string
     */
    public function getControllerPath()
    {
        $controllerPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $controllerPath = trim($controllerPath,'/');

        return $controllerPath ?: 'index';
    }

    /**
     * @return string
     */
    public function getControllerParameters()
    {
        $controllerParameters = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        return $controllerParameters;
    }

}