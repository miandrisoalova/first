<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends Controller
{
    /**
     * @Route("/store", name="store")
     */
    public function index()
    {
        return $this->render('store/index.html.twig', [
            'controller_name' => 'StoreController',
        ]);
    }
}
