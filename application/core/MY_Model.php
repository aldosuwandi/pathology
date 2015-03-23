<?php

class MY_Model extends  CI_Model {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected $entityName;

    function __construct()
    {
        parent::__construct();
        $CI =& get_instance();
        $CI->load->library('Doctrine');
        $this->entityManager = $CI->doctrine->em;
    }

    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    public function findById($id)
    {
        return $this->getEntityManager()->find($this->entityName,$id);
    }

    public function findAll()
    {
        return $this->getEntityManager()->getRepository($this->entityName)->findAll();
    }

    public function create($object)
    {
        $this->getEntityManager()->persist($object);
        $this->getEntityManager()->flush();
    }

    public function delete($object)
    {
        $this->getEntityManager()->remove($object);
        $this->getEntityManager()->flush();
    }

    public function update($object)
    {
        $this->getEntityManager()->merge($object);
        $this->getEntityManager()->flush();
    }


}