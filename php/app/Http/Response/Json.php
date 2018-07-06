<?php

namespace Stas\Http\Response;

class Json extends AbstractResponse
{
    /**
     * @inheritdoc
     */
    protected $headers = [
        'Content-Type: application/json'
    ];

    /**
     * @return string
     */
    public function getBody(): string
    {
        return is_array($this->body) ? json_encode($this->body) : $this->body;
    }
}