<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('model_user');
    }


    public function index()
    {
        $users = $this->model_user->findAll();
        unset($users[0]);
        $result = array();
        foreach ($users as $user) {
            $result[] = $user->getUsername();
        }
        $this->load->view('login',[
            'users' => json_encode($result)
        ]);
    }


    public function submit()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        }
        else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->model_user->getUser($username,$password);
            if ($user) {
                $userGroup =  $user->getUserGroup()->getName();
                $this->session->set_userdata([
                    'username' => $username,
                    'user_group' => $userGroup
                ]);
                if ($userGroup == 'operator') {
                    redirect('/admin/index');
                } else {
                    redirect('/patient/index');
                }
            } else {
                $this->load->view('login');
            }
        }


    }

    public function out()
    {
        $this->session->sess_destroy();
        redirect('/login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */