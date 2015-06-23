<?php

use Shepard\Entity\SimpleJob;
use Shepard\Entity\SimpleUser;
use Shepard\Lister\SimpleLister;
use Shepard\Manager\SimpleManager;

class SimpleListerTest extends PHPUnit_Framework_TestCase
{
    public function testPrintJobs()
    {
        $lister = new SimpleLister($this->mockManager());

        $this->assertStringMatchesFormat("%s - %s Due: %s", $lister->printJobs($this->mockUser()));
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function mockManager()
    {
        $manager = $this->getMockBuilder(SimpleManager::class)->getMock();
        $job = $this->mockJob();
        $manager->expects($this->once())
            ->method('loadJob')
            ->will($this->returnValue([$job]));

        return $manager;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function mockJob()
    {
        $job = $this->getMockBuilder(SimpleJob::class)->getMock();
        $deadline = new \DateTime("tomorrow");
        $job->expects($this->once())
            ->method('getAuthor')
            ->will($this->returnValue("John Doe"));
        $job->expects($this->once())
            ->method('getDescription')
            ->will($this->returnValue("Foo Bar."));
        $job->expects($this->once())
            ->method('getDeadline')
            ->will($this->returnValue($deadline));

        return $job;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function mockUser()
    {
        $job = $this->getMockBuilder(SimpleUser::class)->getMock();
        $timezone = new \DateTimeZone("Europe/Budapest");
        $job->expects($this->once())
            ->method('getTimezone')
            ->will($this->returnValue($timezone));

        return $job;
    }
}
