<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $ramdomImg = [
            '/uploads/asia.jpg',
            '/uploads/broadway.png',
            '/uploads/broadway2.png',
        ];

        $randomIndex = rand(0, sizeof($ramdomImg)-1);

        return $this->render('homepage/index.html.twig', [
            'controller_name'   => 'HomepageController',
            'background'        => $ramdomImg[$randomIndex]
        ]);
    }
}
