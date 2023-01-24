<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_homepage')]
class HomepageController extends AbstractController
{
    public function __construct(private readonly PostRepository $postRepository)
    {
    }

    public function __invoke(): Response
    {
        $posts = $this->postRepository->findLast(10);

        return $this->render('homepage.html.twig', ['posts' => $posts]);
    }
}
