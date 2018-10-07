<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends Controller
{
    /**
     * @Route("/", name="hello")
     */
    public function index()
    {
        $name = "home";
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
            'name' => $name
        ]);
    }

    /**
     * @Route("/hello/{name}", name="hello_word")
     */
    public function hello($name){

        $response = $this->container->get('App\Service\Hello');

        return new Response($response->writeHello($name));

        /*return $this->render('hello/hello.html.twig',[
            'name' => $name
        ]);*/
    }
}