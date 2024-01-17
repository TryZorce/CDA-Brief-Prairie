<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $customer1 = new customer();
        $customer1->setName('customer1');
        $customer1->setPhone('0622014104');
        $customer1->setAddress('Male');
        $manager->persist($customer1);

        $customer2 = new customer();
        $customer2->setName('customer2');
        $customer2->setPhone('0695048164');
        $customer2->setAddress('Female');
        $manager->persist($customer2);

        $customer3 = new customer();
        $customer3->setName('customer3');
        $customer3->setPhone('0685123485');
        $customer3->setAddress('Male');
        $manager->persist($customer3);

        $customer4 = new customer();
        $customer4->setName('customer4');
        $customer4->setPhone('0691348534');
        $customer4->setAddress('Female');
        $manager->persist($customer4);

        $manager->flush();
    }
}
