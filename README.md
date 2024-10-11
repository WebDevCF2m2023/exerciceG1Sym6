# exerciceG1Sym6

- Créez un fork de ce projet
- Suivez les `README.md` de https://github.com/WebDevCF2m2023/EntitiesG1

À partir des `entités` et du `.env` de ce `repository`,

Créez la base de donnée, trouvez un template front et/ou un autre template back.

Vous devez pouvoir vous connecter avec un `User` (avec mot de passe crypté) au rôle `ROLE_ADMIN`

Créez une administration en back-end,

Mais surtout un site (+-) fonctionnel en front-end

## Les fixtures

Ce sont des données générées pour remplir nos bases de données en `dev`

Voir la documentation : 

https://symfony.com/bundles/DoctrineFixturesBundle/current/index.html

### Installation

     composer require --dev orm-fixtures

Cette commande nous crée un fichier par défaut : `src/DataFixtures/AppFixtures.php`

On va commencer à insérer un `User` :

```php
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

```

Pour l'insérer dans la DB, on peut utiliser

    php bin/console doctrine:fixtures:load

ou

    php bin/console d:f:l

**Ceci écrase la DB !**, Pour éviter, vous pouvez ajouter :

    php bin/console d:f:l --append

#### Hachages des mots de passe

Ici notre mot de passe n'est pas crypté, et seul notre Admin est disponible

On va importer le hacher de mot de passe

```php
### ...
# On va hacher les mots de passe
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
### ...
# attribut contenant le hacher de mot de passe
    private UserPasswordHasherInterface $passwordHasher;

    # constructeur qui remplit les attributs
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        # hache le mot de passe
        $this->passwordHasher = $passwordHasher;
    }
### ...
        # hachage du mot de passe
        $pwdHash = $this->passwordHasher->hashPassword($user, 'admin');
        # insertion du mot de passe haché
        $user->setPassword($pwdHash);
        $user->setUserActive(true);
### ...

```


### On souhaite avoir ces utilisateurs

- admin -> admin -> [ROLE_ADMIN, ROLE_REDAC, ROLE_MODERATOR]
- redac1 -> redac1 -> [ROLE_REDAC]
- redac2 -> redac2 -> [ROLE_REDAC]
- redac3 -> redac3 -> [ROLE_REDAC]
- redac4 -> redac4 -> [ROLE_REDAC]
- redac5 -> redac5 -> [ROLE_REDAC]
- moderator1 -> moderator1 -> [ROLE_MODERATOR]
- moderator2 -> moderator2 -> [ROLE_MODERATOR]
- moderator3 -> moderator3 -> [ROLE_MODERATOR]
- une trentaine d'utilisateur sans rôle le login == mot de passe

On va devoir ajouter un module permettant de créer du faux contenu.

### Installation de Faker

        composer require fakerphp/faker

La documentation :

https://fakerphp.org/

#### Fixtures ok pour les `User`

On peut se connecter avec les différents utilisateurs


