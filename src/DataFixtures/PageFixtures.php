<?php

namespace App\DataFixtures;

use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < mt_rand(2, 4); $i++) {
            $page = new Page();
            $page->setTitle($faker->sentence());
            $page->setContent($faker->paragraph());

            $manager->persist($page);
        }

        $manager->flush();
    }
}
