<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


Class MainController extends AbstractController {

    #[Route('/', name: 'app_main')]

    public function index () {
        
      return $this->render('main.html.twig');
    }



    #[Route('/contact', name: 'app_contact')]

    public function contact () {
        
      return $this->render('contact.html.twig');
      
    } 
}

    
    