<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Equipo;

/**
 * @Route("/equipo")
 */
class showTeamsController extends AbstractController
{
    /**
     * @Route("/lista" , name="lista" )
     * 
     *      */
    public function listaEquipos()
    {
        $repository = $this->getDoctrine()->getRepository(Equipo::class);
        $equipos = $repository->findAll();

        return $this->render(
            'equipos/lista.html.twig',
            ['equipos' => $equipos]
        );
    }

    /**
     * @Route("/nuevo" , name="nuevoEquipo" )
     * 
     *      */
    public function nuevoEquipo()
    {
        $number = random_int(0, 100);

        return $this->render(
            'equipos/nuevo.html.twig',
            ['number' => $number]
        );
    }
}
