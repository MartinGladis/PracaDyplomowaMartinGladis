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
            'categories' => $categoryRepository->findAllBySortingAlphabetical(),
        ]);
    }

    /**
     * @Route("/category/{slug}", name="products-by-category")
     */
    public function productsByCategory(string $slug, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy(['slug' => $slug]);

        return $this->render('category/products-by-category.html.twig', [
            'products' => $category->getProducts(),
            'category' => $category,
        ]);
    }
}
