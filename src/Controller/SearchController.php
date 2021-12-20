<?php

namespace App\Controller;

use App\Repository\ProductRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(Request $request, ProductRepository $productRepository): Response
    {
        $value = $request->get('value');
        return $this->render('search/index.html.twig', [
            'value' => $value,
            'products' => $productRepository->findByPartOfName($value),
        ]);
    }
}
