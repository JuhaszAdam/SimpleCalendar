<?php

namespace Shepard\Entity;

class SimpleUser
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTimeZone
     */
    private $timezone;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \DateTimeZone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param \DateTimeZone $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }
}
