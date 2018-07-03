<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 03.07.18
 * Time: 14:55
 */

class Request
{
    /**
     * This is the request method
     * @var $method
     */
    private $method;

    /**
     * This is the request path
     * @var $path
     */
    private $path;

    /**
     * This is query params if request method is 'get'
     * @var $queryParams
     */
    private $queryParams;


    public function __construct($server)
    {
        $this->method = strtolower($server['REQUEST_METHOD']);
        $this->path = parse_url($server['REQUEST_URI'], PHP_URL_PATH);
        $this->queryParams = parse_url($server['REQUEST_URI'], PHP_URL_QUERY);
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }
}