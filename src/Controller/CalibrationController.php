<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalibrationController extends AbstractController
{
    /**
     * @Route("/calibration", name="calibration")
     */
    public function index(): Response
    {
        return $this->render('calibration/index.html.twig');
    }
}
