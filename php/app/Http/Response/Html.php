<?php

namespace Stas\Http\Response;

class Html extends AbstractResponse
{
    /**
     * @inheritdoc
     */
    protected $headers = [
        'Content-Type: text/html'
    ];
}