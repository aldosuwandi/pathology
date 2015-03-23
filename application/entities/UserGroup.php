<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroup
 */
class UserGroup
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     * @return UserGroup
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
     * Set Id
     *
     * @param string $id
     * @return UserGroup
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }
}
