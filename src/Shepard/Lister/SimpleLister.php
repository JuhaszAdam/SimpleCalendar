<?php

namespace Shepard\Lister;

use Shepard\Entity\SimpleJob;
use Shepard\Entity\SimpleUser;
use Shepard\Manager\SimpleManager;

class SimpleLister
{
    /**
     * @var SimpleLister
     */
    private $manager;

    public function __construct(SimpleManager $manager)
    {
        $this->manager = $manager;
    }

    public function printJobs(SimpleUser $user)
    {
        $result = '<ul>';
        foreach ($this->manager->loadJob() as $job) {
            /** @var SimpleJob $job */
            $deadline = $job->getDeadline();
            $deadline->setTimezone($user->getTimezone());

            $result .= sprintf("<li>%s - %s Due: %s</li>",
                $job->getAuthor(),
                $job->getDescription(),
                $deadline->format("Y.m.d H:i:s")
            );
        }
        $result .= '</ul>';

        return $result;
    }
}