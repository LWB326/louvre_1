<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Billet;
use AppBundle\Entity\Commande;
use Doctrine\DBAL\Types\IntegerType;
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


class BilletController extends Controller
{
    /**
     * @Route("billet", name="billet")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('index2.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

	
	/**
    * @Route("addBillet", name="addBillet")
    */
 	public function addBilletAction(Request $request)
  	{
    // On cree un objet Billet
    $billet = new Billet();

    // On indique les valeurs par defaut//aucune
        //aucune
        //


    $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $billet);

	$formBuilder
      ->add('nomDuVisiteur',     TextType::class)
      ->add('prenomDuVisiteur', TextType::class)
      ->add('paysVisiteur', TextType::class)
	  ->add('tarifReduit',		ChoiceType::class, array('choices' => array('Non' => false,'Oui' => true,),))
	  ->add('dateNaissanceVisiteur', DateType::class)

      ->add('save',      		SubmitType::class)
     ;
	$form = $formBuilder->getForm();

//		
    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $em = $this->getDoctrine()->getManager();
      $em->persist($billet);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Billet bien enregistré.');

      return $this->redirectToRoute('addBillet', array('id' => $billet->getId()));
    }		
	
//		
    return $this->render('Billet/add.html.twig', array(
        'billet'=>$billet,
        'form'=>$form->createView(),
    ));
  	}	
	
}
