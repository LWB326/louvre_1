<?php
//src/AppBundle/Controller/CommandeController.php

namespace AppBundle\Controller;


use AppBundle\Entity\Commande;
use AppBundle\Entity\Billet;
use AppBundle\Form;
use AppBundle\Form\BilletType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CommandeController extends Controller
{
    /**
     * @Route("addCommande", name="addCommande")
     */
    public function addCommandeAction(Request $request)
    {
        // On cree un objet Commande
        $commande = new Commande();

        // On indique les valeurs par defaut
        //aucune valeur par défaut

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $commande);
        $formBuilder
            ->add('dateVisite', DateType::class)
            ->add('demieJournee', ChoiceType::class, array(
                'choices' => array(
                    'Non' => false,
                    'Oui' => true)
            ))

            ->add('nomClient', TextType::class)
            ->add('prenomClient', TextType::class)
            ->add('urlClient', TextType::class)
            // imbrication du formulaire de saisie des billets
            ->add('billets', CollectionType::class, array(
                'entry_type' => BilletType::class,
                'allow_add' => true,
                'allow_delete' => true
            ))
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

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
            'commande'=>$commande,
            //'form' => $form->createView(),
        ));
    }
}

