<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Test extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_test');
        $this->mainModel = $this->model_test;
        $this->resource = 'test';
    }


    protected function createPost($object = null)
    {
        if (!$object) {
            $object = new PathologyTest();
        }
        $object->setName($this->input->post('name'));
        $object->setExpectedValue($this->input->post('expected_value'));
        $object->setUnit($this->input->post('unit'));
        return $object;
    }

}