<?php

namespace App\DataFixtures;

use App\Entity\ContentManagementSystem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CMSFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contentManagementSystem = new ContentManagementSystem();
        $contentManagementSystem->setName('WordPress');
        $contentManagementSystem->setIcon('fab fa-wordpress');
        $manager->persist($contentManagementSystem);

        $manager->flush();
    }
}
