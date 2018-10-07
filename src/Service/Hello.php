<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class Hello{
    private $templating;
    private $logger;

    public function __construct(\Twig_Environment $templating, LoggerInterface $logger){
        $this->templating = $templating;
        $this->logger = $logger;
    }

    public function writeHello($name='lova'){
        return $this->templating->render('hello/hello.html.twig', [
            'name' => $name,
        ]);
    }

    public function writeBonjour($name="test"){
        return $this->logger->info("logger " . $name);
    }
}