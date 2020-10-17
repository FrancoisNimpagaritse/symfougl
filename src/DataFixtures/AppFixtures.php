<?php

namespace App\DataFixtures;

use App\Entity\Academicyear;
use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Campus;
use App\Entity\Coursesperiod;
use App\Entity\Cursus;
use App\Entity\EnumNiveau;
use App\Entity\Minervalpayment;
use App\Entity\Registration;
use App\Entity\Registrationfeespayment;
use App\Entity\Student;
use App\Entity\University;
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
         //Nous gérons l'université
         $university = new University();
         $university->setName("Université des Grands Lacs")
                    ->setAdress("12 Avenue Bwenge Saint Michel, Bujumbura, Burundi");

        $manager->persist($university);
        //Nous gérons les campus
        $campuses = [];
        for($i = 1; $i<= 5; $i++) {

            $campus = new Campus();
            $campus->setName($faker->sentence())
                    ->setDateOpen($faker->dateTimeBetween('-5 years','now'))
                    ->setAdress($faker->address());
            
            $manager->persist($campus);
            $campuses[] = $campus;
        }

        //Nous gérons les cursus
        $curses= [];
        for($i = 1; $i<= 10; $i++) {

            $cursus = new Cursus();
            $cursus->setName($faker->sentence())
            ->setTypedivision($faker->sentence())
            ->setAppelationdivision($faker->sentence());
            
            $manager->persist($cursus);
            $cursuses[] = $cursus;
        }

        //Nous gérons les Enumniveau
        $niveaus = [];
        for($i = 1; $i<= 3; $i++) {

            $enumNiveau = new EnumNiveau();
            $enumNiveau->setAppelation($i . " ème Année");
            
            $manager->persist($enumNiveau);
            $niveaus[] = $enumNiveau;
        }
        //Nous gérons l'année academique
            $acadyear = new Academicyear();

            $acadyear->setName("2019-2020")
            ->setRegistrationFees(10000)
            ->setInsuranceFees(15000)
            ->setYearStatus("actif");
            
            $manager->persist($acadyear);
        

        //Nous gérons les périodes de cours
        $coursesperiods= [];
        for($i = 1; $i<= 3; $i++) {

            $courseperiod = new Coursesperiod();
            $courseperiod->setTrimestre($i . " ème Trimestre")
                        ->setDateSart($faker->dateTimeBetween('-1 years','now'))
                        ->setDateEnd($faker->dateTimeBetween('-1 years','now'))
                        ->setAcademicyear($acadyear)
                        ->setDueAmount(250000)
                        ->setEnumNiveau("1ère Année");
            
            $manager->persist($courseperiod);
            $coursesperiods[] = $courseperiod;
        }
        //Nous gérons les étudiants
        $students = [];
        $genres = ['masculin','féminin'];
        for($i = 1; $i<= 300; $i++) {

            $student = new Student();
            $genre = $faker->randomElement($genres);
            $student->setFirstname($faker->firstName($genre ='male'|'female'))
                    ->setLastname($faker->lastname)
                    ->setDateBirth($faker->dateTimeBetween('-22 years','now'))
                    ->setPlaceBirth($faker->address)
                    ->setCommuneBirth($faker->word)
                    ->setProvinceBirth($faker->word)
                    ->setEtatCivil($faker->word)
                    ->setCountry($faker->country)
                    ->setGender($genre)
                    ->setNationality($faker->country)
                    ->setAddress($faker->address)
                    ->setParentAddress($faker->address)
                    ->setTutorFirstname($faker->firstname)
                    ->setTutorLastname($faker->lastname)
                    ->setTutorPhone($faker->phoneNumber)
                    ->setNationalIdNumber($faker->word)
                    ->setFatherFirstname($faker->firstname)
                    ->setFatherLastname($faker->lastname)
                    ->setMotherFirstname($faker->firstname)
                    ->setMotherLastname($faker->lastname)
                    ->setFatherProfession($faker->word)
                    ->setMotherProfession($faker->word)
                    ->setStudentConjoint($faker->firstname . ' ' . $faker->lastname)
                    ->setHasSecondaryCertificate(mt_rand(0,1))
                    ->setIsHomologue(mt_rand(0,1))
                    ->setSecondaryCertificateType($faker->word)
                    ->setSecondarySchool($faker->sentence)
                    ->setDateIssued($faker->dateTimeBetween('-10 years','now'))
                    ->setYearObtention(mt_rand(1990, 2018))
                    ->setMention($faker->word)
                    ->setGradePercentage(mt_rand(35,90))
                    ->setDpe($faker->word)
                    ->setHasSecondaryCertificate(mt_rand(0,1))
                    ->setInstute($faker->sentence)
                    ->setDiplomaCertificate($faker->sentence)
                    ->setYearObtentionUniv(mt_rand(1990, 2018))
                    ->setHasAttestationFrequentation(mt_rand(0, 1))
                    ->setInterruptionPeriod($faker->sentence)
                    ->setInterruptionOccupation($faker->sentence);            
            
            $manager->persist($student);
            $students[] = $student;
        }
        //Nous gérons les inscriptions
        $regis = [];
        for($i = 1; $i<= 300; $i++) {

            $registration = new Registration();

            $stud = $students[mt_rand(0, count($students) - 1)];
            $camp = $campuses[mt_rand(0, count($campuses) - 1)];
            $curs = $cursuses[mt_rand(0, count($cursuses) - 1)];
            $niveau = $niveaus[mt_rand(0, count($niveaus) - 1)];

            $registration->setDateRegistration($faker->dateTimeBetween('-1 years','now'))
                        ->setHasChoiceInfo(mt_rand(0, 1))
                        ->setChoiceExterneInterne($faker->word)
                        ->setStudent($stud)
                        ->setUniversity($university)
                        ->setAcademicyear($acadyear)
                        ->setNiveau($niveau)
                        ->setCampus($camp)
                        ->setCursus($curs)
                        ->setUser($adminUser);
            
            $manager->persist($registration);
            $regis[] = $registration;
        }
        //Nous gérons les paiements frais d'inscription
        for($i = 1; $i<= 100; $i++) {

            $registrationfeespay = new Registrationfeespayment();

            $regia = $regis[mt_rand(0, count($regis) - 1)];

            $registrationfeespay->setDatePaid($faker->dateTimeBetween('-1 years','now'))
                        ->setPaidAmount(mt_rand(10000, 15000))
                        ->setVoucher('Bodereau N° ' . mt_rand(254444, 754488))
                        ->setLibelle('Paiement Frais Inscription')
                        ->setUser($adminUser)
                        ->setRegistration($regia);
            
            $manager->persist($registrationfeespay);
        }
        //Nous gérons les paiemenents minos
        for($i = 1; $i<= 500; $i++) {

            $minospayment = new Minervalpayment();

            $regio = $regis[mt_rand(0, count($regis) - 1)];
            $cp = $coursesperiods[mt_rand(0, count($coursesperiods) - 1)];

            $minospayment->setDatePaid($faker->dateTimeBetween('-1 years','now'))
                        ->setPaidAmount(mt_rand(10000, 15000))
                        ->setVoucher('Bodereau N° ' . mt_rand(254444, 754488))
                        ->setLibelle('Paiement Frais Inscription')
                        ->setUser($adminUser)
                        ->setRegistration($regio)
                        ->setCoursesperiod($cp);
            
            $manager->persist($minospayment);
        }

        $manager->flush();


    }
}
