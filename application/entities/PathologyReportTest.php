<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * PathologyReportTest
 */
class PathologyReportTest
{
    /**
     * @var string
     */
    private $result;

    /**
     * @var string
     */
    private $note;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \PathologyReport
     */
    private $pathologyReport;

    /**
     * @var \PathologyTest
     */
    private $pathologyTest;


    /**
     * Set result
     *
     * @param string $result
     * @return PathologyReportTest
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return string 
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return PathologyReportTest
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pathologyReport
     *
     * @param \PathologyReport $pathologyReport
     * @return PathologyReportTest
     */
    public function setPathologyReport(\PathologyReport $pathologyReport = null)
    {
        $this->pathologyReport = $pathologyReport;

        return $this;
    }

    /**
     * Get pathologyReport
     *
     * @return \PathologyReport 
     */
    public function getPathologyReport()
    {
        return $this->pathologyReport;
    }

    /**
     * Set pathologyTest
     *
     * @param \PathologyTest $pathologyTest
     * @return PathologyReportTest
     */
    public function setPathologyTest(\PathologyTest $pathologyTest = null)
    {
        $this->pathologyTest = $pathologyTest;

        return $this;
    }

    /**
     * Get pathologyTest
     *
     * @return \PathologyTest 
     */
    public function getPathologyTest()
    {
        return $this->pathologyTest;
    }
}
