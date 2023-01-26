<?php

namespace App\DataFixtures;

use App\Tests\Factory\PostFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {PostFactory::new()->sequence([
        ['title' => 'Article 1'],
        ['title' => 'Article 2'],
        ['title' => 'Article 3'],
        ['title' => 'Article 4'],
        ['title' => 'Article 5'],
        ['title' => 'Article 6'],
        ['title' => 'Article 7'],
        ['title' => 'Article 8'],
        ['title' => 'Article 9'],
        ['title' => 'Article 10'],
        ['title' => 'Article 11'],
        ['title' => 'Article 12'],
        ['title' => 'Article 13'],
        ['title' => 'Article 14'],
        ['title' => 'Article 15'],
        ['title' => 'Article 16'],
        ['title' => 'Article 17'],
        ['title' => 'Article 18'],
        ['title' => 'Article 19'],
        ['title' => 'Article 20'],
    ])->create();

        $manager->flush();
    }
}
