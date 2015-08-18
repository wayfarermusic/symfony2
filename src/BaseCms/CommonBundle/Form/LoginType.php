<?php

namespace BaseCms\CommonBundle\Form;

use BaseCms\CommonBundle\Form\AbstractContainerAwareType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractContainerAwareType
{
    
    public function __construct()
    {
      
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $container = $this->getContainer();
        
        $builder
            ->add('userId', 'text', 
                array(
                    'label' => 'ユーザーID',
                    'max_length' => $container->getParameter('stext_len'),
                    'required'  => false
                ))
            ->add('password', 'text', 
                array(
                    'label' => 'パスワード', 
                    'max_length' => $container->getParameter('stext_len'),
                    'required'  => false
                ));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'BaseCms\CommonBundle\Entity\DtbAdmin',
        ));
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'validation_groups' => array('login')
        );
    }
    
     public function getName()
    {
      return 'AdminLogin';
    }
}
