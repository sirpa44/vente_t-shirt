<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    /**
     * home controller
     * 
     * @return 
     */
    public function Home()
    {
        $productRepo = $this->em->getRepository(Product::class);
        $products = $productRepo->findAll();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'products' => $products
        ]);
    }
}
