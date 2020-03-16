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
        $user->setUsername('test');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'test'
        ));
        $user->setEmail('test@test.fr');
        $manager->persist($user);

        $user1 = new User();
        $user1->setUsername('admin');
        $user1->setRoles(['ROLE_ADMIN']);
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1,
            'admin'
        ));
        $user1->setEmail('admin@admin.fr');
        $manager->persist($user1);

        $manager->flush();
    }
}
