<?php
// src/AppBundle/Form/CommandeType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CommandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateVisite')
            ->add('demieJournee')
            ->add('nomClient')
            ->add('prenomClient')

            ->add('billets', CollectionType::class, array(
                 'entry_type'   => BilletType::class,
                 'allow_add'    => true,
                 'allow_delete' => true
             ))
            ->add('save',      SubmitType::class)
        ;
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Commande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_commande';
    }


}
