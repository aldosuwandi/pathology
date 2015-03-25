<?php

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class TestData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $test = new PathologyTest();
        $test->setName('Thyroxine');
        $test->setExpectedValue('60 - 120');
        $test->setUnit('nmol/l');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Thyroid Stimulating hormone');
        $test->setExpectedValue('0.25 - 5.0');
        $test->setUnit('IU/ml');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Luteinizing Hormone');
        $test->setExpectedValue('9.6 - 80');
        $test->setUnit('mIU/ml');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Follicle Stimulating Hormone');
        $test->setExpectedValue('6.3 - 24');
        $test->setUnit('mIU/ml');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Prolactin');
        $test->setExpectedValue('5 - 35');
        $test->setUnit('ng/ml');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Aldosterone');
        $test->setExpectedValue('10 - 160');
        $test->setUnit('ng/L');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Alpha-1-Antitypsin');
        $test->setExpectedValue('0.9 - 2.0');
        $test->setUnit('g/L');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Arsenic');
        $test->setExpectedValue('0 - 0.13');
        $test->setUnit('umol/L');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Bicarbonate');
        $test->setExpectedValue('22 - 29');
        $test->setUnit('mmol/L');
        $manager->persist($test);
        $manager->flush();

        $test = new PathologyTest();
        $test->setName('Carbamazepine');
        $test->setExpectedValue('4 - 12');
        $test->setUnit('mg/L');
        $manager->persist($test);
        $manager->flush();

    }
}