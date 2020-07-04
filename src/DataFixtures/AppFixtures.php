<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 1; $i++) {
            $user = new User();
            $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
            $user->setEmail('tester.blog@blog.nl');
            $user->setUsername('Tester');
            $password = $this->encoder->encodePassword($user, 'welkom123');
            $user->setPassword($password);
            $manager->persist($user);
            $manager->flush();
        }

        for ($i = 0; $i < 1; $i++) {
            $user = new User();
            $user->setRoles(['ROLE_USER']);
            $user->setEmail('gebruiker.blog@blog.nl');
            $user->setUsername('gebruiker');
            $password = $this->encoder->encodePassword($user, 'welkom123');
            $user->setPassword($password);
            $manager->persist($user);
            $manager->flush();
        }
    }
}
