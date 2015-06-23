<?php

namespace Shepard\Manager;

use Shepard\Entity\SimpleJob;

class SimpleManager
{
    /**
     * @param SimpleJob $job
     */
    public function saveJob(SimpleJob $job)
    {
        $filename = "/tmp/Shepard/";
        if (!is_dir("{$filename}")) {
            exec("mkdir " . $filename);
        }
        $path = $filename . "Job.txt";

        $deadline = $job->getDeadline();

        $content = sprintf("%s\n%s\n%s\n",
            $job->getAuthor(),
            $job->getDescription(),
            $deadline->format("c"));

        file_put_contents($path, $content, FILE_APPEND | LOCK_EX);
    }
}
