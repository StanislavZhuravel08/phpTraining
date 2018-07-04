<?php

namespace Stas\Http\Response;

class Json extends AbstractResponse
{
    /**
     * @var array|string $body
     */
    private $body;

    /**
     * @inheritdoc
     */
    public function sendResponse()
    {
        header('Content-Type: javascript');
        headers_sent();
        echo $this->body;
    }

    /**
     * @param $body
     * @return AbstractResponse
     */
    public function setBody($body): AbstractResponse
    {
        $this->body = json_encode($body);
        return $this;
    }
}