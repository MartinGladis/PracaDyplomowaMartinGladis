<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        // return $this->render('homepage/index.html.twig', [
        //     'controller_name' => 'HomepageController',
        // ]);

        $greet = '';
        if ($name = $request->query->get('name'))
        {
            $greet = sprintf("Hello %s", htmlspecialchars($name));
        }

        return new Response(
            <<<EOF
            <html>
                <body>
                    <h1>$greet</h1>
                    <img src="images/under-construction.gif" alt="Test Page" />
                </body>
            </html>
            EOF
        );
    }
}
