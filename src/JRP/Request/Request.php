<?php

namespace JRP\Request;


class Request {

    public function __construct($requestType)
    {
        $this->requestType = $requestType;
    }

    public function getRequest($key)
    {
        return $this->requestType[$key];
    }
} 