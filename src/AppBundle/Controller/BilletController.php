<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Billet;
use AppBundle\Form\BilletType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



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
    $form = $this->get('form.factory')->create(BilletType::class, $billet);

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
        'form'=>$form->createView(),
    ));
  	}	
	
}
