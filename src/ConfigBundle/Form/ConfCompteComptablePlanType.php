<?php

namespace ConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ConfCompteComptablePlanType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numCompteComptable')->add('sensAugmentation',ChoiceType::class, array(
                'choices'  => array(
                    'D' => 'D',
                    'C' => 'C',
                )))->add('description')->add('espece')->add('plan',EntityType::class, array(
                'class' => 'ConfigBundle\Entity\ConfPlan',
                'choice_label' => 'designation',));
        //->add('supprimer')$builder->add('pattern', 'text', array('mapped' => false, 'data' => 'alex'))
        //->add('created')->add('typeAnalytique')add('planCompta',ChoiceType::class,array('mapped' => false,'required' => false))
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ConfigBundle\Entity\ConfCompteComptablePlan'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'configbundle_confcomptecomptableplan';
    }


}
