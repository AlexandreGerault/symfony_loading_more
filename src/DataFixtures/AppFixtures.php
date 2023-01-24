<?php

namespace App\DataFixtures;

use App\Tests\Factory\PostFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        PostFactory::new()->many(50)->create();

        $manager->flush();
    }
}
