<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Category;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // create 20 products! Bam!
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName('product '.$i);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
