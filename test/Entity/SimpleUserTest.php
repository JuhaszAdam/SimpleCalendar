<?php

use Shepard\Entity\SimpleUser;

class SimpleUserTest extends PHPUnit_Framework_TestCase
{

    public function testGetterSetter()
    {
        $user = new SimpleUser();
        $user->setName("Yamada Taro");
        $user->setTimezone(new \DateTimeZone("Asia/Hong_Kong"));
    }
}
