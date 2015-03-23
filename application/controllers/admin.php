<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Admin
 * @property Model_user $model_user
 * @property Model_test $model_test
 * @property Model_report $model_report
 */
class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if ($this->session->userdata('user_group') != 'operator') {
            redirect('login');
        } else {
            $this->load->model('model_test');
            $this->load->model('model_report');
            $this->load->model('model_user');
        }
    }

    public function index()
    {
        $this->test();
    }

    public function test()
    {
        $tests = $this->model_test->findAll();
        $this->load->view('admin/admin_dashboard',[
            'content' => $tests,
            'status' => 'test'
        ]);
    }

    public function create_test()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/test/test_create',[
                'content' => null,
                'action' => 'create'
            ]);
        } else {
            $pathologyTest = new PathologyTest();
            $pathologyTest->setName($this->input->post('name'));
            $pathologyTest->setExpectedValue($this->input->post('expected_value'));
            $pathologyTest->setUnit($this->input->post('unit'));
            $this->model_test->create($pathologyTest);
            redirect('admin/index');
        }
    }

    public function delete_test($id)
    {
        $test = $this->model_test->findById($id);
        $this->model_test->delete($test);
        redirect('admin/index');
    }

    public function edit_test($id=null)
    {
        if ($id == null) {
            $test = $this->model_test->findById($this->input->post('id'));
        } else {
            $test = $this->model_test->findById($id);
        }
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/test/test_create',[
                'content' => $test,
                'action' => 'edit'
            ]);
        } else {
            $test->setName($this->input->post('name'));
            $test->setExpectedValue($this->input->post('expected_value'));
            $test->setUnit($this->input->post('unit'));
            $this->model_test->update($test);
            redirect('admin/index');
        }
    }
    
    public function report()
    {
        $reports = $this->model_report->findAll();
        $this->load->view('admin/admin_dashboard',[
            'content' => $reports,
            'status' => 'report'
        ]);
    }
    
    public function create_report()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/report/report_create',[
                'content' => null,
                'action' => 'create'
            ]);
        } else {
            $report = new report();
            $report->setName($this->input->post('name'));
            $report->setAge($this->input->post('age'));
            $report->setGender($this->input->post('gender'));
            $report->setreportname($this->input->post('reportname'));
            $report->setCreatedAt(new DateTime());
            $report->setreportGroup($this->model_report->getreportGroup(2));
            $report->setPassword(md5($this->input->post('password')));
            $this->model_report->create($report);
            redirect('admin/report');
        }
    }

    public function delete_report($id)
    {
        $test = $this->model_report->findById($id);
        $this->model_report->delete($test);
        redirect('admin/report');
    }

    public function edit_report($id=null)
    {
        if ($id == null) {
            $report = $this->model_report->findById($this->input->post('reportname'));
        } else {
            $report = $this->model_report->findById($id);
        }
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/report/report_create',[
                'content' => $report,
                'action' => 'edit'
            ]);
        } else {
            $report->setName($this->input->post('name'));
            $report->setAge($this->input->post('age'));
            $report->setGender($this->input->post('gender'));
            if ($this->input->post('password') != 'default') {
                $report->setPassword(md5($this->input->post('password')));
            }
            $this->model_report->update($report);
            redirect('admin/report');
        }
    }
    public function user()
    {
        $users = $this->model_user->findAll();
        unset($users[0]);
        $this->load->view('admin/admin_dashboard',[
            'content' => $users,
            'status' => 'user'
        ]);
    }

    public function create_user()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/user/user_create',[
                'content' => null,
                'action' => 'create'
            ]);
        } else {
            $user = new User();
            $user->setName($this->input->post('name'));
            $user->setAge($this->input->post('age'));
            $user->setGender($this->input->post('gender'));
            $user->setUsername($this->input->post('username'));
            $user->setCreatedAt(new DateTime());
            $user->setUserGroup($this->model_user->getUserGroup(2));
            $user->setPassword(md5($this->input->post('password')));
            $this->model_user->create($user);
            redirect('admin/user');
        }
    }

    public function delete_user($id)
    {
        $test = $this->model_user->findById($id);
        $this->model_user->delete($test);
        redirect('admin/user');
    }

    public function edit_user($id=null)
    {
        if ($id == null) {
            $user = $this->model_user->findById($this->input->post('username'));
        } else {
            $user = $this->model_user->findById($id);
        }
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/user/user_create',[
                'content' => $user,
                'action' => 'edit'
            ]);
        } else {
            $user->setName($this->input->post('name'));
            $user->setAge($this->input->post('age'));
            $user->setGender($this->input->post('gender'));
            if ($this->input->post('password') != 'default') {
                $user->setPassword(md5($this->input->post('password')));
            }
            $this->model_user->update($user);
            redirect('admin/user');
        }
    }
}