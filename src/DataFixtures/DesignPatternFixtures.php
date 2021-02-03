<?php

namespace App\DataFixtures;

use App\Entity\DesignPattern;
use App\Repository\DesignPatternRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DesignPatternFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $designPattern = new DesignPattern();
        $designPattern->setName('MVC');
        $manager->persist($designPattern);

        $designPattern = new DesignPattern();
        $designPattern->setName('REST');
        $manager->persist($designPattern);

        $manager->flush();
    }
}
