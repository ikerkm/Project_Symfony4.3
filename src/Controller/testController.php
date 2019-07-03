<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class testController extends AbstractController
{
    /**
     * @Route("/home" , name="home" )
     * 
     *      */
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render(
            'home_test.html.twig',
            ['number' => $number]
        );
    }
}
