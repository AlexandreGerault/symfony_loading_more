<?php

declare(strict_types=1);

namespace App\Tests;

use App\Tests\Factory\PostFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class HomepageTest extends WebTestCase
{
    use Factories;
    use ResetDatabase;

    public function testItShowsTheLastArticles(): void
    {
        $client = static::createClient();

        self::createPosts();

        PostFactory::assert()->count(20);

        $client->request('GET', '/');

        self::assertResponseIsSuccessful();

        $crawler = $client->getCrawler();

        self::assertCount(10, $crawler->filter('article'));

        self::assertCount(1, $crawler->selectButton("Charger plus d'articles"));

        $titles = $crawler->filter('article h2')->each(fn ($node) => $node->text());

        self::assertContains('Article 20', $titles);
        self::assertContains('Article 11', $titles);
        self::assertNotContains('Article 10', $titles);
        self::assertNotContains('Article 1', $titles);
    }

    public function testItRendersTheNextArticles(): void
    {
        $client = static::createClient();

        self::createPosts();

        PostFactory::assert()->count(20);

        $client->xmlHttpRequest('GET', '/posts', ['page' => 2]);

        self::assertResponseIsSuccessful();

        $crawler = $client->getCrawler();

        self::assertCount(10, $crawler->filter('article'));

        self::assertCount(0, $crawler->selectButton("Charger plus d'articles"));

        $titles = $crawler->filter('article h2')->each(fn ($node) => $node->text());

        self::assertNotContains('Article 20', $titles);
        self::assertNotContains('Article 11', $titles);
        self::assertContains('Article 10', $titles);
        self::assertContains('Article 1', $titles);
    }

    private static function createPosts(): void
    {
        PostFactory::new()->sequence([
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
    }
}
