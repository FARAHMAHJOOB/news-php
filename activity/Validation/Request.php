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
}
