<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $language = new Language();
        $language->setName('HTML');
        $language->setIcon('fab fa-html5');
        $manager->persist($language);

        $language = new Language();
        $language->setName('CSS');
        $language->setIcon('fab fa-css3-alt');
        $manager->persist($language);

        $language = new Language();
        $language->setName('Javascript');
        $language->setIcon('fab fa-js-square');
        $manager->persist($language);

        $language = new Language();
        $language->setName('PHP');
        $language->setIcon('fab fa-php');
        $manager->persist($language);

        $language = new Language();
        $language->setName('SQL');
        $manager->persist($language);

        $manager->flush();
    }
}
