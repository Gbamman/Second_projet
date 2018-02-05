<?php

namespace ConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ConfigBundle\Entity\ConfTypeOperation;
use ConfigBundle\Entity\ConfJournal;
use ConfigBundle\Entity\ConfSociete;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ConfSchemaOperationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codeSchema')->add('designation')->add('nbrEtape')->add('societe',EntityType::class, array(
                'class' => ConfSociete::class,
                'choice_label' => 'description',))->add('journal',EntityType::class, array(
                'class' => ConfJournal::class,
                'choice_label' => 'libelle',
                ))->add('typeOperation',EntityType::class, array(
                'class' => ConfTypeOperation::class,
                'choice_label' => 'libelle',
                ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ConfigBundle\Entity\ConfSchemaOperation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'configbundle_confschemaoperation';
    }


}
