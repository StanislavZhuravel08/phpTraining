<?php

namespace Stas\Http;

use Stas\Http\Response\AbstractResponse;
use Stas\Models\dbConnection;

abstract class AbstractController
{
    const TEMPLATE_PATH = '.' . DS . 'php' . DS . 'view' . DS;

    /**
     * @var Request
     */
    private $request;

    /**
     * AbstractController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return AbstractResponse
     */
    abstract public function execute(): AbstractResponse;

    /**
     * @return Request
     */
    protected function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * Getting parameters for query to db
     *
     * @return array|string
     */
    protected function getControllerParameters()
    {
        $controllerParameters = [];
        $request = new Request();
        $parameters = $request->getControllerParameters();

        if ($parameters !== null) {
            $parameters = explode('&', $parameters);

            if (isset($parameters)) {
                foreach ($parameters as $key) {
                    $key = explode('=', $key);
                    $controllerParameters[$key[0]] = $key[1];
                }

                return $controllerParameters;
            }
        }

        return $controllerParameters = '';
    }

    /**
     * @param $object
     * @return string
     */
    protected function thisShortName($object): string
    {
        $name = basename(str_replace('\\', '/', get_class($object)));
        return $name = lcfirst($name);
    }

    /**
     * $msg is query result
     *
     * @return array
     */
    protected function dbResult(): array
    {
        $queryName = $this->thisShortName($this);
        $queryParams = $this->getControllerParameters();
        $dbConnection = new dbConnection();
        $msg = $dbConnection->getQueryResult($queryName, $queryParams);
        return $msg;
    }

    /**
     * @return string
     */
    protected function renderPage(): string
    {
        ob_start();
        include(self::TEMPLATE_PATH . 'front-page.phtml');
        return ob_get_clean();
    }

    /**
     * @return string
     */
    protected function getContentTemplate(): string
    {
        return self::TEMPLATE_PATH . 'templates' . DS. $this->getRequest()->getControllerPath() . '.phtml';
    }
}