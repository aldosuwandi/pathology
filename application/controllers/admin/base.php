<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Base
 * @property Model_user $model_user
 * @property Model_test $model_test
 * @property Model_report $model_report
 */
abstract class Base extends MY_Controller
{
    /**
     * @var MY_Model
     */
    protected $mainModel;
    
    protected $resource;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if ($this->session->userdata('user_group') != 'operator') {
            redirect('login');
        } 
    }

    public function index()
    {
        $objects = $this->mainModel->findAll();
        $this->load->view('admin/admin_dashboard',[
            'content' => $objects,
            'status' => $this->resource
        ]);
    }

    public function create()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/'.$this->resource.'/'.$this->resource.'_create',[
                'content' => null,
                'action' => 'create'
            ]);
        } else {
            $object = $this->createPost();
            $this->mainModel->create($object);
            redirect('admin/'.$this->resource);
        }
    }

    public function delete($id)
    {
        $object = $this->mainModel->findById($id);
        $this->mainModel->delete($object);
        redirect('admin/'.$this->resource);
    }

    public function edit($id=null)
    {
        if ($id == null) {
            $object = $this->mainModel->findById($this->input->post('id'));
        } else {
            $object = $this->mainModel->findById($id);
        }
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/'.$this->resource.'/'.$this->resource.'_create',[
                'content' => $object,
                'action' => 'edit'
            ]);
        } else {
            $object = $this->createPost();
            $this->mainModel->update($object);
            redirect('admin/'.$this->resource);
        }
    }
    
    protected abstract function createPost($object = null);
    
}