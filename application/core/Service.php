<?php

namespace core;
 
class Service
{
    protected DatabaseAdapter $dbAdapter;
    public function __construct()
    {
        $this->dbAdapter = new DatabaseAdapter();
    }
}