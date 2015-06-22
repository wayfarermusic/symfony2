<?php

namespace Acme\HelloBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class HelloType extends AbstractType
{
    
    public function __construct()
    {
      
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('name', 'text', 
                array(
                  'label' => '名前',
                  'max_length' => 50,
                ))
            ->add('email', 'email', array('label' => 'E-mail'))
            ->add('tel1', 'text')
            ->add('tel2', 'text')
            ->add('tel3', 'text')
            ->add('comment', 'textarea', array('label' => 'お問い合わせ項目'));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'Acme\HelloBundle\Entity\Hello',
        ));
    }
    
    
    public function getName()
    {
      return 'hello';
    }
    
}
