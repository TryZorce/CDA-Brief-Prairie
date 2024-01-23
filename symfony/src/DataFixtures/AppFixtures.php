<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;
use App\Entity\Pet;
use App\Entity\Meet;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Create customers
        $customer1 = new Customer();
        $customer1->setName('Christopher MORON');
        $customer1->setEmail('christopher.moron@gmail.com');
        $customer1->setPhone('0695048164');
        $customer1->setAddress('4 rue de Lamartine 73100 Aix-Les-Bains'); 
        $manager->persist($customer1);
        
        $customer2 = new Customer();
        $customer2->setName('Cléa ANTOINE');
        $customer2->setEmail('antoine.clea@gmail.com');
        $customer2->setPhone('0622014104');
        $customer2->setAddress('15 avenue du Gard');
        $manager->persist($customer2);

        $cat1 = new Pet();
        $cat1->setName('Garfield');
        $cat1->setSex('Male');
        $cat1->setBirth(new \DateTime('2019-01-01'));
        $cat1->setRace('Maine Coon');
        $cat1->setCustomer($customer1);
        $manager->persist($cat1);

        $cat2 = new Pet();
        $cat2->setName('Princesse');
        $cat2->setSex('Femelle');
        $cat2->setBirth(new \DateTime('2020-03-15'));
        $cat2->setRace('Persian');
        $cat2->setCustomer($customer1);
        $manager->persist($cat2);

        $cat3 = new Pet();
        $cat3->setName('Aura');
        $cat3->setSex('Femelle');
        $cat3->setBirth(new \DateTime('2018-05-20'));
        $cat3->setRace('Chat Noir');
        $cat3->setCustomer($customer2);
        $manager->persist($cat3);

        // Create meets
        $meet1 = new Meet();
        $meet1->setName('Checkup');
        $meet1->setDescription('Checkup de routine');
        $meet1->setDate(new \DateTime('2022-02-15'));
        $meet1->setPet($cat1);
        $manager->persist($meet1);

        $meet2 = new Meet();
        $meet2->setName('Blessure a la patte');
        $meet2->setDescription("Soin de l'animal");
        $meet2->setDate(new \DateTime('2022-03-10'));
        $meet2->setPet($cat2);
        $manager->persist($meet2);

        $meet3 = new Meet();
        $meet3->setName('Allergie');
        $meet3->setDescription('Vérification des allergies du chat');
        $meet3->setDate(new \DateTime('2022-04-05'));
        $meet3->setPet($cat3);
        $manager->persist($meet3);

        $manager->flush();
    }
}
