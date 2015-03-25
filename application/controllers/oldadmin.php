<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Admin
 * @property Model_user $model_user
 * @property Model_test $model_test
 * @property Model_report $model_report
 */
class OldAdmin extends MY_Controller
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
                'action' => 'create',
                'users' => $this->model_user->findAll()
            ]);
        } else {
            $report = new PathologyReport();
            $user = $this->model_user->findById($this->input->post('user'));
            $report->setTitle($this->input->post('title'));
            $report->setUser($user);
            $report->setNote($this->input->post('note'));
            $report->setDateTaken(new DateTime($this->input->post('date')));
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
            $report = $this->model_report->findById($this->input->post('id'));
        } else {
            $report = $this->model_report->findById($id);
        }
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('admin/report/report_create',[
                'content' => $report,
                'action' => 'edit',
                'tests' => $this->model_test->findAll(),
                'reportTests' => $this->model_report->getReportTests($id)
            ]);
        } else {
            $report->setTitle($this->input->post('title'));
            $report->setNote($this->input->post('note'));
            $report->setDateTaken(new DateTime($this->input->post('date')));
            $this->model_report->update($report);
            redirect('admin/report');
        }
    }

    public function create_test_report()
    {
        $testReport = new PathologyReportTest();
        $testReport->setResult($this->input->post('result'));
        $testReport->setPathologyTest($this->model_test->findById($this->input->post('test')));
        $testReport->setPathologyReport($this->model_report->findById($this->input->post('report')));;
        $testReport->setNote($this->input->post('note'));
        $this->model_report->createReportTest($testReport);
        redirect('admin/edit_report/'.$this->input->post('report'));
    }

    public function delete_test_report($id)
    {
        $this->model_report->deleteReportTest($id);
        redirect('admin/report');
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
            $user->setMobile($this->input->post('mobile'));
            $user->setUserGroup($this->model_user->getUserGroup(2));
            $user->setPassword($this->input->post('password'));
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
                $user->setPassword($this->input->post('password'));
            }
            $this->model_user->update($user);
            redirect('admin/user');
        }
    }
}