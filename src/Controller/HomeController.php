<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profile()
    {
        $user = $this->getUser()->getUsername();
        return $this->render('home/profile.html.twig', [
            'user' => $user,
        ]);
    }
}
