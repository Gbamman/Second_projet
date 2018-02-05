<?php

namespace ConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ConfigBundle\Entity\ConfSociete;
use ConfigBundle\Entity\ConfPeriode;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ConfExerciceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('enCours')->add('periode',EntityType::class, array(
                'class' => ConfPeriode::class,
                'choice_label' => 'libelle',)))->add('societe',EntityType::class, array(
                'class' => ConfSociete::class,
                'choice_label' => 'description',)));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ConfigBundle\Entity\ConfExercice'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'configbundle_confexercice';
    }

}
