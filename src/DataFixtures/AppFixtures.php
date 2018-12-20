<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Media;
use App\Entity\Product;
use App\Entity\Store;
use App\Entity\VAT;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        $vats = [];
        $tva1 = new VAT();
        $tva1->setMultiplicate('0.982');
        $tva1->setName('TVA 1.75%');
        $tva1->setValue('1.75');
        $manager->persist($tva1);

        $tva2 = new VAT();
        $tva2->setMultiplicate('0.833');
        $tva2->setName('TVA 20%');
        $tva2->setValue('20');
        $manager->persist($tva2);

        $vats[] = $tva1;
        $vats[] = $tva2;

        $categories = [];
        for ($i = 0; $i < 5; $i++)
        {
            $category = new Category();
            $category->setName($faker->word);

            $image = new Media();
            $image->setPath($faker->imageUrl(400, 200));
            $manager->persist($image);

            $category->addImage($image);

            $manager->persist($category);

            $categories[] = $category;
        }

        for ($i = 0; $i < 5; $i++)
        {
            $store = new Store();;
            $store->setName($faker->name);

            $image = new Media();
            $image->setPath($faker->imageUrl(400, 200));
            $manager->persist($image);
            $store->addImage($image);

            $manager->persist($store);

            for ($j = 0; $j < mt_rand(6, 10); $j++ ) {
                $image = new Media();
                $image->setPath($faker->imageUrl(400, 200));
                $manager->persist($image);

                $product = new Product();
                $product->setName($faker->sentence(mt_rand(5, 8)));
                $product->setDescription($faker->paragraph(1));
                $product->setCategory($categories[mt_rand(0, 4)]);
                $product->setStore($store);
                $product->setPrice($faker->randomFloat(2, 1, 50));
                $product->setVat($vats[mt_rand(0, 1)]);
                $product->addImage($image);

                $manager->persist($product);
            }
        }

        $manager->flush();
    }
}
