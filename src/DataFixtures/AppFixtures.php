<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
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
        $faker = Factory::create('fr-FR');

        //Nous gérons les rôles
        $adminRole = new Role();
        $adminRole->setTitle('ROLE_ADMIN');
        
        $manager->persist($adminRole);

        $adminUser = new User();
        $adminUser->setFirstname('Francis')
                  ->setLastname('Kundermann')
                  ->setEmail('franimpa@yahoo.fr')
                  ->setHash($this->encoder->encodePassword($adminUser, 'password'))
                  ->addUserRole($adminRole);
        
        $manager->persist($adminUser);
        //Nous gérons les utilisateurs
        for($i = 1; $i <= 5; $i++)
        {
            $user = new User();
            $pass = $this->encoder->encodePassword($user, "12345");
             $user->setFirstname($faker->firstName)
                    ->setLastname($faker->lastName)
                    ->setEmail($faker->email)
                    ->setHash($pass);
    
             $manager->persist($user);
         }

        $manager->flush();
    }
}
