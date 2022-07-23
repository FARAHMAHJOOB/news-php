<?php

namespace Validation;

class Request
{
    private $request = [];
    private $newRequest = [];
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function setRequest($fields)
    {
        foreach ($fields as $field) {
            $this->newRequest[$field] =  $this->request[$field];
        }

        return $this->newRequest;
    }

    public function __destruct()
    {
        // save old value of inputs
        foreach ($this->request as $key => $request) {
            flash($key, $request);
        }
    }
}
