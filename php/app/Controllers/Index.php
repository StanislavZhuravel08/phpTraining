<?php

namespace Stas\Controllers;

use Stas\Http\Response\AbstractResponse;
use Stas\Http\Response\Html;
use Stas\Models\dbConnection;

class Index extends \Stas\Http\AbstractController
{
    /**
     * @var array
     */
    private $studios;

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
    public function getStudios(): array
    {
        if ($this->studios === null) {
            $queryName = $this->thisShortName($this);
            $dbConnection = new dbConnection();
            $this->studios = $dbConnection->getQueryResult($queryName, '');
        }

        return $this->studios;
    }
}