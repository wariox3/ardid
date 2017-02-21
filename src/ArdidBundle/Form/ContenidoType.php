<?php

namespace ArdidBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ContenidoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('titulo', TextType::class, array('required' => true))
                ->add('contenido', TextareaType::class, array('required' => true))
                ->add('codigoFormatoIso', TextType::class, array('required' => true))
                ->add('version', TextType::class, array('required' => true))
                ->add('fechaVersion', DateType::class, array('format' => 'yyyyMMMdd'))
                ->add('guardar', SubmitType::class);
    }

    public function getBlockPrefix() {
        return 'form';
    }

}
