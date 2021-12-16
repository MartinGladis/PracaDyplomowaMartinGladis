<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{slug}", name="product")
     */
    public function index(string $slug = '', ProductRepository $productRepository, CategoryRepository $categoryRepository): Response
    {
        $product = $productRepository->findOneBy(['slug' => $slug]);
        if (!$product) {
            return $this->render('product/no_product.html.twig');
        }
        $category = $categoryRepository->findOneBy(['id' => $product->getCategory()]);
        return $this->render('product/index.html.twig', [
            'product' => $product,
            'category' => $category,
        ]);
    }
}
