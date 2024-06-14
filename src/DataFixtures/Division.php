<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Division extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $division = new \App\Entity\Division();
            $division->setName($faker->name);
            $division->setSeason($this->getReference('season_' . $faker->numberBetween(0, 9)));
            $manager->persist($division);
        }

        $manager->flush();
    }
}
