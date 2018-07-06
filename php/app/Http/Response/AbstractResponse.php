<?php

namespace Stas\Http\Response;

class AbstractResponse
{
    /**
     * @var array $headers
     */
    protected $headers = [];

    /**
     * @var array|string $body
     */
    protected $body;

    /**
     * This class send Response
     *
     * @return void
     */
    public function sendResponse()
    {
        foreach ($this->headers as $header) {
            header($header);
        }
        headers_sent();
        echo $this->getBody();
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
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