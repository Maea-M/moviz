<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasherInterface) {}
    
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@site.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user,'password'));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('user1@site.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user,'password'));
        $manager->persist($user);

        $manager->flush();
    }
}
