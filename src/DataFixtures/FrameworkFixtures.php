<?php

namespace App\DataFixtures;

use App\Entity\Framework;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FrameworkFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $framework = new Framework();
        $framework->setName('Symfony');
        $framework->setIcon('fab fa-symfony');
        $manager->persist($framework);

        $framework = new Framework();
        $framework->setName('Laravel');
        $framework->setIcon('fab fa-laravel');
        $manager->persist($framework);

        $framework = new Framework();
        $framework->setName('PHP Unit');
        $manager->persist($framework);

        $manager->flush();
    }
}
