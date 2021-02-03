<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Thierry');
        $user->setLastname('DUFOSSE');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'thierry'
        ));
        $user->setEmail('t.dufosse666@gmail.com');
        $user->setAge('41 ans');
        $user->setAdress('LORMONT');
        $user->setLanguage('Français');
        $user->setNationality('Français');
        $user->setGithub('https://github.com/Angelus-Dev-GitHub');
        $user->setLinkedin('https://www.linkedin.com/in/thierry-dufosse');
        $user->setPhone('0678232726');
        $manager->persist($user);

        $manager->flush();
    }
}
