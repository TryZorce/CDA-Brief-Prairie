<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Meet;

class MeetFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $meet1 = new Meet();
        $meet1->setName('Meet1');
        $meet1->setDescription('img/Chat1.jpg');
        $meet1->setDate(new \DateTime('2020-01-01'));
        $manager->persist($meet1);

        $meet2 = new Meet();
        $meet2->setName('Meet2');
        $meet2->setDescription('img/Chat2.jpg');
        $meet2->setDate(new \DateTime('2019-05-15'));
        $manager->persist($meet2);

        $meet3 = new Meet();
        $meet3->setName('Meet3');
        $meet3->setDescription('img/Chat3.jpg');
        $meet3->setDate(new \DateTime('2022-03-10'));
        $manager->persist($meet3);

        $meet4 = new Meet();
        $meet4->setName('Meet4');
        $meet4->setDescription('img/Chat4.jpg');
        $meet4->setDate(new \DateTime('2021-08-20'));
        $manager->persist($meet4);

        $manager->flush();
    }
}
