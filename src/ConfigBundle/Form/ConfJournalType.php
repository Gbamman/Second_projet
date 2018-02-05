<?php

namespace ConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ConfigBundle\Entity\ConfSociete;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ConfJournalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codeJournal')->add('libelle')->add('compteContrePartie')->add('estBanque')->add('societe', EntityType::class, array(
                // query choices from this entity
                'class' => ConfSociete::class,

                // use the User.username property as the visible option string
                'choice_label' => 'description',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ConfigBundle\Entity\ConfJournal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'configbundle_confjournal';
    }


}
