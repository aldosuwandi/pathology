<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PathologyTest
 */
class PathologyTest
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $unit;

    /**
     * @var string
     */
    private $expectedValue;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     * @return PathologyTest
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return PathologyTest
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set expectedValue
     *
     * @param string $expectedValue
     * @return PathologyTest
     */
    public function setExpectedValue($expectedValue)
    {
        $this->expectedValue = $expectedValue;

        return $this;
    }

    /**
     * Get expectedValue
     *
     * @return string 
     */
    public function getExpectedValue()
    {
        return $this->expectedValue;
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
}
