<?php

use Shepard\Entity\SimpleJob;

class SimpleJobTest extends PHPUnit_Framework_TestCase
{
    public function testGetterSetter()
    {
        $job = new SimpleJob();
        $job->setAuthor("John Doe");
        $job->setDescription("Foo Bar.");
        $tomorrow = new DateTime("tomorrow");
        $job->setDeadline($tomorrow);

        $this->assertEquals("John Doe", $job->getAuthor());
        $this->assertEquals("Foo Bar.", $job->getDescription());
        $this->assertEquals($tomorrow, $job->getDeadline());
    }
}
