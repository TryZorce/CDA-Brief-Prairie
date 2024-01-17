<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pet;

class CatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $pet1 = new Pet();
        $pet1->setName('Pet1');
        $pet1->setImage('img/Chat1.jpg');
        $pet1->setSex('Male');
        $pet1->setBirth(new \DateTime('2020-01-01'));
        $pet1->setRace('Race1');
        $manager->persist($pet1);

        $pet2 = new Pet();
        $pet2->setName('Pet2');
        $pet2->setImage('img/Chat2.jpg');
        $pet2->setSex('Female');
        $pet2->setBirth(new \DateTime('2019-05-15'));
        $pet2->setRace('Race2');
        $manager->persist($pet2);

        $pet3 = new Pet();
        $pet3->setName('Pet3');
        $pet3->setImage('img/Chat3.jpg');
        $pet3->setSex('Male');
        $pet3->setBirth(new \DateTime('2022-03-10'));
        $pet3->setRace('Race3');
        $manager->persist($pet3);

        $pet4 = new Pet();
        $pet4->setName('Pet4');
        $pet4->setImage('img/Chat4.jpg');
        $pet4->setSex('Female');
        $pet4->setBirth(new \DateTime('2021-08-20'));
        $pet4->setRace('Race4');
        $manager->persist($pet4);

        $manager->flush();
    }
}
