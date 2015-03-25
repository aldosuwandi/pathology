<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Patient
 * @property Model_report $model_report
 * @property Model_user $model_user
 */
class Patient extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_report');
        $this->load->model('model_user');
        $this->load->library('session');
    }


    public function index()
    {
        $username = $this->session->userdata('username');
        $reports = $this->model_report->getReportByUser($username);
        $this->load->view('patient_dashboard',[
            'reports' => $reports
        ]);
    }

    public function report($id)
    {
        $report = $this->model_report->findById($id);
        $reportTest = $this->model_report->getReportTests($id);
        $this->load->view('patient_report',[
            'report' => $report,
            'reportTests' => $reportTest
        ]);
    }


    private function generateHTMLReport($reportId)
    {
        $report = $this->model_report->findById($reportId);
        $reportTests = $this->model_report->getReportTests($report->getId());
        $body = $report->getNote().'<br/>';
        $table =
            '<h4>Pathology Test Result</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Result</th>
                        <th>Unit</th>
                        <th>Note</th>
                    </tr>
                    </thead>
                    <tbody>';

        $tableBody = '';
        foreach($reportTests as $testResult) {
            $resultName = $testResult->getPathologyTest()->getName();
            $resultResult = $testResult->getResult();
            $resultUnit = $testResult->getPathologyTest()->getUnit();
            $resultNote = $testResult->getNote();

            $tableBody = $tableBody . "<tr>
                    <td>$resultName</td>
                    <td>$resultResult</td>
                    <td>$resultUnit</td>
                    <td>$resultNote</td>
                </tr>";

        }
        $table = $table.$tableBody.'</tbody></table>';
        $body = $body.$table;
        return $body;
    }

    public function mail()
    {
        $this->load->library('PHPCIMailer');
        $name = $this->model_user->findById($this->session->userdata('username'))->getName();
        $email = $this->input->post('email');
        $report = $this->model_report->findById($this->input->post('report'));
        $subject = 'Pathology Test Result for '.$report->getTitle().'on '.$report->getDateTaken()->format('Y-m-d');
        $body = $this->generateHTMLReport($report->getId());
        $this->phpcimailer->createEmail($email,$name,$subject,$body);
    }

    public function pdf()
    {
        $this->load->library('SnappyPDF');
        $report = $this->model_report->findById($this->input->post('report'));
        $filename = $this->model_user->findById($this->session->userdata('username'))->getName();
        $body = $this->generateHTMLReport($report->getId());
        $this->snappypdf->createPDF($body,$filename);
    }
}