<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $produit = new Produit();
            $produit->setName($faker->name);
            $produit->setPrice($faker->randomFloat(2, 0, 100));
            $produit->setCode($faker->ean13);
            $produit->setUrlImg($faker->imageUrl(640, 480, 'animals', true));
            $manager->persist($produit);
        }

        $manager->flush();
    }
}
