<?php

namespace App\DataFixtures;

use App\Entity\Method;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MethodFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $method = new Method();
        $method->setName('Agile/SCRUM');
        $manager->persist($method);

        $manager->flush();
    }
}
