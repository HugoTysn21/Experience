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
//        $ramdomImg = [
//            '/uploads/asia.jpg',
//            '/uploads/pexels-photo-940035.jpeg',
//            '/uploads/austin-neill-189146-unsplash.jpg',
//            '/uploads/pexels-photo-1112109.jpeg',
//            '/uploads/pexels-photo-256219.jpeg',
//        ];
//
//        $randomIndex = rand(0, sizeof($ramdomImg)-1);

        return $this->render('homepage/index.html.twig', [
            'controller_name'   => 'HomepageController',
//            'background'        => $ramdomImg[$randomIndex]
        ]);
    }
}
