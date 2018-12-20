<?php

namespace App\Controller;

use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends Controller
{
    /**
     * @Route("/", name="main.home")
     */
    public function index(StoreRepository $storeRepository)
    {
        $stores = $storeRepository->findAll();

        return $this->render('main/index.html.twig', [
            'stores' => $stores,
        ]);
    }
}
