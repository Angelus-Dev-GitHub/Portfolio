<?php

namespace App\DataFixtures;

use App\Entity\TypeProject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $typeproject = new TypeProject();
        $typeproject->setName('Projet Ecole');
        $manager->persist($typeproject);

        $typeproject = new TypeProject();
        $typeproject->setName('Hackathon');
        $manager->persist($typeproject);

        $typeproject = new TypeProject();
        $typeproject->setName('Projet Perso');
        $manager->persist($typeproject);

        $typeproject = new TypeProject();
        $typeproject->setName('Projet Entreprise');
        $manager->persist($typeproject);

        $manager->flush();
    }
}
