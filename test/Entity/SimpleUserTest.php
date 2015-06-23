<?php

use Shepard\Entity\SimpleUser;

class SimpleUserTest extends PHPUnit_Framework_TestCase
{
    public function testGetterSetter()
    {
        $user = new SimpleUser();
        $user->setName("無名氏");
        $timezone = new \DateTimeZone("Asia/Hong_Kong");
        $user->setTimezone($timezone);

        $this->assertSame("無名氏", $user->getName());
        $this->assertEquals($timezone, $user->getTimezone());
    }
}
