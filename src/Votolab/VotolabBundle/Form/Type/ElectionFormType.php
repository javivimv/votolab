<?php
namespace Votolab\VotolabBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ElectionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                'text',
                array(
                    'required' => true,
                    'label' => 'título',
                    'trim' => true
                )
            )
            ->add(
                'description',
                'textarea',
                array(
                    'required' => true,
                    'label' => 'descripción',
                    'trim' => true
                )
            )
            ->add(
                'slug',
                'text',
                array(
                    'required' => true,
                    'label' => 'slug',
                    'trim' => true
                )
            )
            ->add(
                'minCandidates',
                'text',
                array(
                    'required' => true,
                    'label' => 'mínimo candidatos',
                    'trim' => true
                )
            )
            ->add(
                'maxCandidates',
                'text',
                array(
                    'required' => true,
                    'label' => 'máximo candidatos',
                    'trim' => true
                )
            )
            ->add(
                'dateStart',
                'date',
                array(
                    'input'  => 'datetime',
                    'widget' => 'choice',
                    'label' => 'Fecha inicio',
                )
            )
            ->add(
                'dateEnd',
                'date',
                array(
                    'input'  => 'datetime',
                    'widget' => 'choice',
                    'label' => 'Fecha fin',
                )
            )
            ->add(
                'datePublished',
                'date',
                array(
                    'input'  => 'datetime',
                    'widget' => 'choice',
                    'label' => 'Fecha de publicación',
                )
            )
            ->add(
                'publishResults',
                'choice',
                array(
                    'choices' => array('1' => 'Sí', '0' => 'No'),
                    'required' => true
                )
            );
    }

    public function getName()
    {
        return 'election';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Votolab\VotolabBundle\Form\Model\ElectionFormClass',
            )
        );
    }
}
