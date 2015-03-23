<?php

class Model_report extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->entityName = 'PathologyReport';
    }

}