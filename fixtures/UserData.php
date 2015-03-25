<?php

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class UserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('Aldo Suwandi');
        $user->setAge('24');
        $user->setCreatedAt(new DateTime());
        $user->setGender('male');
        $user->setMobile('+6287877074577');
        $user->setPassword('admin');
        $user->setUsername('admin');
        $user->setUserGroup($manager->find('UserGroup',1));
        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setName('Tester Name');
        $user->setAge('24');
        $user->setCreatedAt(new DateTime());
        $user->setGender('male');
        $user->setMobile('+6287877074577');
        $user->setPassword('tester');
        $user->setUsername('tester');
        $user->setUserGroup($manager->find('UserGroup',2));
        $manager->persist($user);
        $manager->flush();

        $faker = Faker\Factory::create();
        for ($i=0; $i < 10; $i++) {
            $user = new User();
            $username = $faker->domainWord;
            $user->setName($faker->name);
            $user->setAge($faker->randomNumber(2));
            $user->setCreatedAt(new DateTime());
            $user->setGender($faker->randomElement(['Male','Female']));
            $user->setMobile($faker->phoneNumber);
            $user->setPassword($username);
            $user->setUsername($username);
            $user->setUserGroup($manager->find('UserGroup',2));
            $manager->persist($user);
            $manager->flush();
        }

    }
}