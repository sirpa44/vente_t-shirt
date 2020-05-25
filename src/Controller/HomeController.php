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
        $product = new Product();
        $product->setName('t-shirt bio blanc');
        $product->setDescription('t-shirt fabrique avec des produit biologique issue du commerce equitable, il est de couleur blanc et de taille M');
        $product->setPrice(15.95);

        $this->em->persist($product);
        $this->em->flush();
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
