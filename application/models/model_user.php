<?php

class Model_user extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->entityName = 'User';
    }

    public function getUser($username,$password)
    {
        $user = $this->findById($username);
        if ($user) {
            if ($user->getPassword() == md5($password)) {
                return $user;
            }
        }
        return null;
    }

    /**
     * @param $id
     * @return UserGroup
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getUserGroup($id)
    {
        $userGroup = $this->getEntityManager()->find('UserGroup',$id);
        return $userGroup;
    }

}