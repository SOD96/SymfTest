<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function showIndex(): Response
    {
        $pageTitle = 'Word Checker';

        return $this->render('index.html.twig', [
            'page_title' => $pageTitle,
        ]);
    }
}