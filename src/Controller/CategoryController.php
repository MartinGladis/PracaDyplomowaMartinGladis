<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{name}", name="category")
     */
    public function index(string $name = ''): Response
    {
        // return $this->render('category/index.html.twig', [
        //     'controller_name' => 'CategoryController',
        // ]);

        $greet = '';
        if ($name) {
            $greet = sprintf('<h1>Hello %s<h1>', htmlspecialchars($name));
        }


        return new Response(
            <<<EOF
            <html>
                <body>
                    $greet
                    <img src="/images/under-construction.gif" />
                </body>
            </html>
            EOF
        );
    }
}
