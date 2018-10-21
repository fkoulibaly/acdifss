<?php

namespace ProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('debut')->add('fin')->add('deviseFinancement')->add('montantTotal')->add('contributionMonetaireEtatGnf')->add('contributionMonetaireEtatUsd')->add('contributionPnds')->add('contributionPtss')->add('contributionDiPnds')->add('objectifGeneral')->add('leadershipGouvernanceSanitaire')->add('financementRhsQualite')->add('prestationsServices')->add('produitSsEit')->add('sisrSante');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProjetBundle\Entity\Projet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projetbundle_projet';
    }


}
