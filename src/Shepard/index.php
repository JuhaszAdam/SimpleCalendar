<html>
<head>

</head>
<body>
<h1>Listák</h1>
<?php
require '../../vendor/autoload.php';

use Shepard\Entity\SimpleJob;
use Shepard\Entity\SimpleUser;
use Shepard\Lister\SimpleLister;
use Shepard\Manager\SimpleManager;

$user1 = newUser("John Doe", new \DateTimeZone("America/New_York"));
$user2 = newUser("無名氏", new \DateTimeZone("Asia/Hong_Kong"));

$manager = new SimpleManager();
$manager->clearJobs();

newJob($manager, $user1, "Sweep the floors", new \DateTime("2015-09-23 08:00:00"));
newJob($manager, $user2, "不聞不若聞之", new \DateTime("2015-10-09 12:00:00"));
newJob($manager, $user1, "Scrub the dishes", new \DateTime("2015-09-23 15:00:00"));

$lister = new SimpleLister($manager);

echo $lister->printJobs($user1);
echo $lister->printJobs($user2);

function newUser($name, \DateTimeZone $timezone)
{
    $user = new SimpleUser();
    $user->setName($name);
    $user->setTimezone($timezone);

    return $user;
}

function newJob(SimpleManager $manager, SimpleUser $user, $description, \DateTime $deadline)
{
    $job = new SimpleJob();
    $job->setAuthor($user->getName());
    $job->setDescription($description);
    $job->setDeadline($deadline);

    $manager->saveJob($job);
}

?>

</body>
</html>