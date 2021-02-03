<?php

namespace App\DataFixtures;

use App\Entity\Librairie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LibrairieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $librairie = new Librairie();
       $librairie->setName('Bootstrap');
       $librairie->setIcon('fab fa-bootstrap');
       $manager->persist($librairie);

       $librairie = new Librairie();
       $librairie->setName('BJquery');

       $manager->persist($librairie);

       $librairie = new Librairie();
       $librairie->setName('Webpack encore');
       $manager->persist($librairie);

       $librairie = new Librairie();
       $librairie->setName('Yarn');
       $librairie->setIcon('fab fa-yarn');
       $manager->persist($librairie);

       $librairie = new Librairie();
       $librairie->setName('React');
       $librairie->setIcon('fab fa-react');
       $manager->persist($librairie);

        $manager->flush();
    }
}
