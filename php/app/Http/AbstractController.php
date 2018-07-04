<?php

namespace Stas\Http;

use Stas\Http\Response\AbstractResponse;

abstract class AbstractController
{
    /**
     * @var Request
     */
    private $request;

    /**
     * AbstractController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return AbstractResponse
     */
    abstract public function execute(): AbstractResponse;

    /**
     * @return Request
     */
    protected function getRequest(): Request
    {
        return $this->request;
    }

    protected function thisShortName($object)
    {
        $name = basename(str_replace('\\', '/', get_class($object)));
        return $name;
    }
}