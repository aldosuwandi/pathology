<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PathologyReport
 */
class PathologyReport
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $dateTaken;

    /**
     * @var string
     */
    private $note;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \User
     */
    private $user;


    /**
     * Set title
     *
     * @param string $title
     * @return PathologyReport
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set dateTaken
     *
     * @param \DateTime $dateTaken
     * @return PathologyReport
     */
    public function setDateTaken($dateTaken)
    {
        $this->dateTaken = $dateTaken;

        return $this;
    }

    /**
     * Get dateTaken
     *
     * @return \DateTime 
     */
    public function getDateTaken()
    {
        return $this->dateTaken;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return PathologyReport
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
     * Set user
     *
     * @param \User $user
     * @return PathologyReport
     */
    public function setUser(\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
