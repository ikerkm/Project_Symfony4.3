<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Equipo;
use App\Form\EquipoType;

/**
 * @Route("/equipo")
 */
class EquipoController extends AbstractController
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
    public function nuevoEquipo(Request $request)
    {
        $equipo = new Equipo();
        $form = $this->createForm(EquipoType::class, $equipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $equipo = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipo);
            $entityManager->flush();

            return $this->redirectToRoute('lista');
        }


        return $this->render(
            'equipos/nuevoTemp.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
    /**
     * @Route("/nuevoTemp",name="nuevoEquipoTemp")
     */
    /* public function nuevoEquipoTemp()
    {

        $equipo = new Equipo();
        //Creating team form
        $form = $this->createFormBuilder($equipo)
            ->add(' categoria ')
            ->add(' sexo ')
            ->add(' numjugadores ')
            ->add(' Guardar ', SubmitType::class, [' label ' => ' Create Tas k'])
            ->getForm();
        return $this->render( 'equipo s /nuevoTem p .htm l .twi g', [
             'form' => $form->createView(),
        ]);
    }*/
}
