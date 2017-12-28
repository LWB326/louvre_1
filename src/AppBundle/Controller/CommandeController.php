<?php
//src/AppBundle/Controller/CommandeController.php

namespace AppBundle\Controller;


use AppBundle\Entity\Commande;
use AppBundle\Form\CommandeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommandeController extends Controller
{
    /**
     * @Route("addCommande", name="addCommande")
     */
    public function addCommandeAction(Request $request)
    {
        // On cree un objet Commande
        $commande = new Commande();

        $form = $this->get('form.factory')->create(CommandeType::class, $commande);
//
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Commande bien enregistrée.');

            //return $this->redirectToRoute(array('id' => $commande->getId()), 'addCommande');
            return $this->redirectToRoute('addCommande', array('id' => $commande->getId()));

        }
//
        return $this->render('Commande/add.html.twig', array(
            'form'=>$form->createView(),
        ));
    }
}

