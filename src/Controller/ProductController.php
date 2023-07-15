<?php

namespace App\Controller;

use App\Entity\Product;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;




class ProductController extends AbstractController
{ 
    #[Route('/product', name: 'app_product')]

    public function index (EntityManagerInterface $entityManager) 
    {
        $products = $entityManager->getRepository(Product::class)->findBy(['valid' => true]);
        

        return $this->render('products/index.html.twig', [
            'products' => $products
        ]);
    }


    #[Route('/product/{id}', name: 'app_product_show')]
    public function show($id, EntityManagerInterface $entityManager)
    {
        $product = $entityManager->getRepository(Product::class)->findOneby(['id' => $id]);

        if (is_null($product)) {
            return $this->redirectToRoute('app_product');
        }

        return $this->render('products/show.html.twig', [
            'product' => $product
        ]);
        
    }

}