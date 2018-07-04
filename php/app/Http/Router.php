<?php

namespace Stas\Http;

class Router
{
    const CONTROLLERS = '\Stas\Controllers\\';

    /**
     * Dispatch HTTP request
     */
    public function dispatch()
    {
        $controller = $this->getController();
        $response = $controller->execute();
        $response->sendResponse();
    }

    /**
     * Get request data and find matches
     *
     * @return AbstractController
     */
    public function getController()
    {
        $request = new Request();
        $controller = self::CONTROLLERS . ucfirst($request->getControllerPath());

        if (!class_exists($controller)) {
            throw new \RuntimeException("Controller $controller does not exist!");
        }

        $controllerInstance = new $controller($request);

        if (!$controllerInstance instanceof AbstractController) {
            throw new \RuntimeException("Controller $controller must extend AbstractController!");
        }

        return $controllerInstance;
    }

}