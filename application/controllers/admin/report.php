<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends Base
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_report');
        $this->mainModel = $this->model_report;
        $this->load->model('model_test');
        $this->load->model('model_user');
        $this->resource = 'report';
    }


    public function create()
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

    public function edit($id=null)
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

    protected function createPost($object = null)
    {

    }

    public function create_test_report()
    {
        $testReport = new PathologyReportTest();
        $testReport->setResult($this->input->post('result'));
        $testReport->setPathologyTest($this->model_test->findById($this->input->post('test')));
        $testReport->setPathologyReport($this->model_report->findById($this->input->post('report')));;
        $testReport->setNote($this->input->post('note'));
        $this->model_report->createReportTest($testReport);
        redirect('admin/report/edit/'.$this->input->post('report'));
    }

    public function delete_test_report($id)
    {
        $this->model_report->deleteReportTest($id);
        redirect('admin/report');
    }

}