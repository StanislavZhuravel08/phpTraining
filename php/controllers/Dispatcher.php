<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 03.07.18
 * Time: 15:23
 */



class Dispatcher
{
    private $router;

    /**
     * Dispatcher constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     */
    public function led($request)
    {
        $param = $this->router->match($request);
        echo $param;

        if (!$param) {
            echo "There is no such source";
            return;
        }

        if ($param === './dest/index.html') {
            header('Location: ./dest/index.html');
            headers_sent();
        }


    }

}