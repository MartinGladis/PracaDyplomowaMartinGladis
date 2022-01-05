<?php

namespace App\Controller;

use App\Repository\ProductRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('homepage/index.html.twig', [
            'products' => $productRepository->findByTheNewestProduct(),
        ]);
    }
}
