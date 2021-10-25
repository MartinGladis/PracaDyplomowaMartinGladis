<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/category/{id}", name="productsByCategory")
     */
    public function showProductsByCategory(Category $category, ProductRepository $productRepository): Response
    {
        return $this->render('category/showProductsByCategory.html.twig', [
            'products' => $productRepository->findBy(['category' => $category]),
            'category' => $category,
        ]);
    }
}
