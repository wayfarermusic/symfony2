<?php

namespace BaseCms\CommonBundle\Form;

use BaseCms\CommonBundle\Form\AbstractContainerAwareType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SystemSearchType extends AbstractContainerAwareType
{
    
    public function __construct()
    {
      
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $container = $this->getContainer();
        
        $builder
            ->add('adminId', 'text', 
                array(
                    'label' => '管理者ID',
                    'max_length' => $container->getParameter('int_len'),
                    'required'  => false
                ))
            ->add('name', 'text', 
                array(
                    'label' => '管理者名', 
                    'max_length' => $container->getParameter('stext_len'),
                    'required'  => false
                ))
            ->add('adminLevelId', 'choice',
                array(
                    'choices'   => array('0'=> '----', '1' => '管理者', '2' => '運営者'),
                    'label' => '管理者レベル', 
                    'max_length' => $container->getParameter('sint_len'),
                    'expanded'  => false,
                    'multiple'  => false,
                    'empty_value'  => false,
                    'required'  => false,
                ))
            ->add('status', 'choice',
                array(
                    'choices'   => array('0' => '----', '1' => '有効', '2' => '無効'),
                    'label' => '状態', 
                    'max_length' => $container->getParameter('sint_len'),
                    'expanded'  => false,
                    'multiple'  => false,
                    'empty_value'  => false,
                    'required'  => false,
                ))
            ->add('number', 'choice',
                array(
                    'choices'   => array('1' => '10件', '2' => '20件'),
                    'label' => '状態', 
                    'max_length' => $container->getParameter('sint_len'),
                    'expanded'  => false,
                    'multiple'  => false,
                    'empty_value'  => false,
                    'required'  => false,
                    'data'  => 1,
                ));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'BaseCms\CommonBundle\Entity\DtbAdmin',
        ));
    }
    
    
    public function getName()
    {
      return 'AdminSystemSearch';
    }
    
}
