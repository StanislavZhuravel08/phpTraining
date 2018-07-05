<?php

namespace Stas\Controllers;

use Stas\Http\Response\AbstractResponse;
use Stas\Http\Response\Html;
use Stas\Models\dbConnection;

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
     * Returns associative array with studios data
     *
     * @return array
     */
    private function getRawStudios(): array
    {
        $queryName = $this->thisShortName($this);
        $queryName =lcfirst($queryName);
        $dbConnection = new dbConnection();
        $msg = $dbConnection->getQueryResult($queryName, '');
        return $msg;
    }

    /**
     * @return string
     */
    private function renderPage(): string
    {
        ob_start();
        $studios = $this->getRawStudios();

        include($this->page);

        return ob_get_clean();
    }
}