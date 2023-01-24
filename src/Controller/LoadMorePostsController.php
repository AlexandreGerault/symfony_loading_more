<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/posts', name: 'app_load_more_posts')]
class LoadMorePostsController extends AbstractController
{
    public function __construct(private readonly PostRepository $postRepository)
    {
    }

    public function __invoke(Request $request): Response
    {
        $page = $request->get('page', 1);

        $amountOfArticles = $request->get('amountOfArticles', 10);

        $posts = $this->postRepository->findForPage(page: (int) $page, amountOfArticles: $amountOfArticles);

        return $this->render('_posts.html.twig', ['posts' => $posts]);
    }
}
