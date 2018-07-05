<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 04.07.18
 * Time: 14:10
 */

namespace Stas\Controllers;

use Stas\Http\Response\AbstractResponse;
use Stas\Http\Response\Json;

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
}