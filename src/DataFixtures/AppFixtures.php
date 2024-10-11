<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
# on va récupérer notre entité User
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        # Instanciation d'un User
        $user = new User();
        $user->setUsername('admin');
        $user->setUserMail('admin@gmail.com');
        $user->setRoles(['ROLE_ADMIN','ROLE_REDAC','ROLE_MODERATOR']);
        $user->setPassword('admin');
        $user->setUserActive(true);
        $user->setUserRealName('The Admin !');

        # Utilisation du $manager pour mettre le
        # User en mémoire
        $manager->persist($user);

        # envoie à la base de donnée (commit)
        $manager->flush();
    }
}
