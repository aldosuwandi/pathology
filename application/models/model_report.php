<?php

class Model_report extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->entityName = 'PathologyReport';
    }

    public function getReportByUser($username)
    {
        $reports = $this->findAll();
        $result = array();
        foreach($reports as $report) {
            if ($report->getUser()->getUsername() == $username) {
                $result[] = $report;
            }
        }
        return $result;
    }

    public function getReportTests($id)
    {

        $reportTests = $this->getEntityManager()->getRepository('PathologyReportTest')->findAll();
        $result = array();
        foreach ($reportTests as $reportTest) {
            if ($reportTest->getPathologyReport()->getId() == $id) {
                $result[] = $reportTest;
            }
        }
        return $result;
    }

    public function createReportTest(PathologyReportTest $pathologyReportTest)
    {
        $this->getEntityManager()->persist($pathologyReportTest);
        $this->getEntityManager()->flush();
    }

    public function deleteReportTest($id)
    {
        $reportTest = $this->getEntityManager()->find('PathologyReportTest',$id);
        $this->getEntityManager()->remove($reportTest);
        $this->getEntityManager()->flush();
    }

}