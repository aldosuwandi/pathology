<?php

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class ReportData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $report = new PathologyReport();
        $report->setDateTaken(new DateTime());
        $report->setTitle('Example Report Test #1');
        $report->setUser($manager->find('User','tester'));
        $report->setNote('This is example report');
        $manager->persist($report);
        $manager->flush();

        for ($i = 1; $i < 9 ; $i++) {
            $testReport = new PathologyReportTest();
            $testReport->setResult($i.'0 - '.($i+1).'0');
            $testReport->setPathologyReport($manager->find('PathologyReport',1));
            $testReport->setPathologyTest($manager->find('PathologyTest',$i));
            $manager->persist($testReport);
            $manager->flush();
        }

        $report = new PathologyReport();
        $report->setDateTaken(new DateTime());
        $report->setTitle('Example Report Test #2');
        $report->setUser($manager->find('User','tester'));
        $report->setNote('This is example report');
        $manager->persist($report);
        $manager->flush();

        for ($i = 1; $i < 9 ; $i++) {
            $testReport = new PathologyReportTest();
            $testReport->setResult($i.'0 - '.($i+1).'0');
            $testReport->setPathologyReport($manager->find('PathologyReport',2));
            $testReport->setPathologyTest($manager->find('PathologyTest',$i));
            $manager->persist($testReport);
            $manager->flush();
        }


    }
}