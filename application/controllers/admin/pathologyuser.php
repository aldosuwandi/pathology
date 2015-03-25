<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PathologyUser extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
        $this->mainModel = $this->model_user;
        $this->resource = 'user';
    }


    public function index()
    {
        $users = $this->mainModel->findAll();
        unset($users[0]);
        $this->load->view('admin/admin_dashboard',[
            'content' => $users,
            'status' => 'user'
        ]);
    }

    protected function createPost($object = null)
    {
        if (!$object) {
            $object = new User();
            $object->setUsername($this->input->post('username'));
            $object->setCreatedAt(new DateTime());
            $object->setUserGroup($this->model_user->getUserGroup(2));
        }
        $object->setName($this->input->post('name'));
        $object->setAge($this->input->post('age'));
        $object->setGender($this->input->post('gender'));
        $object->setMobile($this->input->post('mobile'));
        $object->setPassword($this->input->post('password'));
        return $object;
    }


}