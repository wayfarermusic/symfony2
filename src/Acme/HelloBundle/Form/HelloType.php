<?php

namespace Acme\HelloBundle\Form;

use Acme\HelloBundle\Form\AbstractContainerAwareType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HelloType extends AbstractContainerAwareType
{
    
    public function __construct()
    {
      
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $container = $this->getContainer();
        
        $builder
            ->add('name', 'text', 
                array(
                    'label' => '名前',
                    'max_length' => $container->getParameter('stext_len'),
                    'required'  => false
                ))
            ->add('email', 'email', 
                array(
                    'label' => 'E-mail', 
                    'required'  => false
                ))
            ->add('tel1', 'text',
                array(
                    'required'  => false
                ))
            ->add('tel2', 'text',
                array(
                    'required'  => false
                ))
            ->add('tel3', 'text',
                array(
                    'required'  => false
                ))
            ->add('comment', 'textarea', 
                array(
                    'label' => 'お問い合わせ項目',
                    'required'  => false
                ));
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
