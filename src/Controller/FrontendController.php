<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('pages/index.html.twig');
    }

    /**
     * @Route("/gallery", name="gallery")
     */
    public function gallery(): Response
    {
        return $this->render('pages/gallery.html.twig');
    }

    /**
     * @Route("/exhibitions", name="exhibitions")
     */
    public function exhibitions(): Response
    {
        return $this->render('pages/exhibitions.html.twig');
    }

    /**
     * @Route("/products", name="products")
     */
    public function products(): Response
    {
        return $this->render('pages/products.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        return $this->render('pages/about.html.twig');
    }
}
