<?php
namespace ArdidBundle\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReclamoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('motivo', TextType::class, array('required' => true))
            ->add('reclamoTipoRel', EntityType::class, array(
                'class' => 'ArdidBundle:ReclamoTipo',
                'choice_label' => 'nombre',
                'required' => true
            ))    
            ->add('descripcion', TextareaType::class, array('required' => false))
            ->add('guardar', SubmitType::class);        
    }
 
    public function getBlockPrefix()
    {
        return 'form';
    }
}

