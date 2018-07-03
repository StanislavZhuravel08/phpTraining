<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 03.07.18
 * Time: 13:19
 */


class Router
{

    /**
     * Stores route with it's action
     *
     * @var array
     */
    protected $routes = [
        'get' => [
            '/' => './dest/index.html',
            '/feesByAge' => ''],
        'post' => []
    ];

    /**
     * Adding new route
     *
     * @param $method
     * @param $path
     * @param $params
     */
    public function addRoute( $method, $path, $params)
    {
        $this->routes[$method][$path] = $params;
    }

    /**
     * @return array
     */
    public function showRoutes()
    {
        return $this->routes;
    }

    /**
     * Get request data and find matches
     *
     * @param Request $request
     * @return bool|string
     */
    public function match($request) {
        $method = $request->getMethod();

        if (!isset($this->routes[$method])) {
            return false;
        }

        $path = $request->getPath();

        $queryParam = $request->getQueryParams();

        foreach ($this->routes[$method] as $pattern => $params) {
            if ($pattern === $path) {
                return $params;
            }
        }

        return '';

    }

}