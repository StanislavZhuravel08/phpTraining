<?php

namespace Stas\Controllers;

use Stas\Http\Response\AbstractResponse;
use Stas\Http\Response\Html;

class Index extends \Stas\Http\AbstractController
{

    private $page = "./php/view/front-page.php";

    /**
     * @inheritdoc
     */
    public function execute(): AbstractResponse
    {
        $response = new Html();
        $response->setBody($this->renderPage());
        return $response;
    }

    /**
     * Renders needed page
     *
     * @return string
     */
    private function renderPage()
    {
        ob_start();
        include($this->page);

        return ob_get_clean();
    }
}