<?php

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class UserGroupData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userGroup = new UserGroup();
        $userGroup->setName('operator');
        $manager->persist($userGroup);
        $manager->flush();

        $userGroup = new UserGroup();
        $userGroup->setName('patient');
        $manager->persist($userGroup);
        $manager->flush();

    }
}