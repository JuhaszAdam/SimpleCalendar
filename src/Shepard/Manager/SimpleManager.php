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

    /**
     * @return SimpleJob[]
     */
    public function loadJob()
    {
        $path = "/tmp/Shepard/Job.txt";
        $file = fopen($path, "r");

        $jobs = [];
        while (($buffer = fgets($file)) !== false) {
            $author = $buffer;
            $description = fgets($file);
            $deadline = fgets($file);

            $job = new SimpleJob();
            $job->setAuthor($author);
            $job->setDescription($description);
            $job->setDeadline(new \DateTime($deadline));
            array_push($jobs, $job);
        }

        return $jobs;
    }

    public function clearJobs()
    {
        $path = "/tmp/Shepard/Job.txt";
        file_put_contents($path, "");
    }
}
