<?php

class Model_test extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->entityName = 'PathologyTest';
    }

}