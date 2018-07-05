<?php
/**
 * Created by PhpStorm.
 * User: stanislavz
 * Date: 05.07.18
 * Time: 12:18
 */

namespace Stas\Controllers;

use Stas\Http\Response\AbstractResponse;
use Stas\Http\Response\Json;

class ActorsByStudios extends  \Stas\Http\AbstractController
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