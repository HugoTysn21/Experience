<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WorkExpController extends AbstractController
{
    /**
     * @Route("/work/", name="work_exp")
     */
    public function index()
    {
        return $this->render('work_exp/index.html.twig', [
            'controller_name' => 'WorkExpController',
        ]);
    }
}
