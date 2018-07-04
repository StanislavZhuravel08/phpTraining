<?php

namespace Stas\Http\Response;

class AbstractResponse
{
    /**
     * @var array|string $body
     */
    private $body;

    /**
     * This class send Response
     *
     * @return void
     */
    public function sendResponse()
    {
        headers_sent();
        echo $this->body;
    }

    /**
     * @param $body
     * @return AbstractResponse
     */
    public function setBody($body): AbstractResponse
    {
        $this->body = $body;
        return $this;
    }
}