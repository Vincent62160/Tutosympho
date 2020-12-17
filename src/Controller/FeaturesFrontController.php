<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeaturesFrontController extends AbstractController
{
    /**
     * @Route("/features/front", name="features_front")
     */
    public function index(): Response
    {
        return $this->render('features_front/index.html.twig', [
            'controller_name' => 'FeaturesFrontController',
        ]);
    }
}
