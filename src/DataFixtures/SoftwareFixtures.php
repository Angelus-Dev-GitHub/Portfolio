<?php

namespace App\DataFixtures;

use App\Entity\Software;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SoftwareFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $software = new Software();
        $software->setName('PHP Storm');
        $manager->persist($software);

        $software = new Software();
        $software->setName('MySQL Workbench');
        $manager->persist($software);

        $software = new Software();
        $software->setName('GIT');
        $software->setIcon('fab fa-git-square');
        $manager->persist($software);

        $software = new Software();
        $software->setName('API');
        $manager->persist($software);

        $manager->flush();
    }
}
