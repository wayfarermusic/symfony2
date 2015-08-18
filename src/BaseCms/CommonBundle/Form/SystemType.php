<?php

namespace BaseCms\CommonBundle\Form;

use BaseCms\CommonBundle\Form\AbstractContainerAwareType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SystemType extends AbstractContainerAwareType
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
            ->add('userId', 'text', 
                array(
                    'label' => 'ユーザーID', 
                    'max_length' => $container->getParameter('stext_len'),
                    'required'  => false
                ))
            ->add('password', 'password',
                array(
                    'label' => 'パスワード', 
                    'max_length' => $container->getParameter('password_len'),
                    'required'  => false
                ))
            ->add('salt', 'text',
                array(
                    'required'  => false
                ))
            ->add('adminLevelId', 'choice',
                array(
                    'choices'   => array('0' => '', '1' => '管理者', '2' => '運営者'),
                    'label' => '管理者レベル', 
                    'max_length' => $container->getParameter('sint_len'),
                    'expanded'  => false,
                    'multiple'  => false,
                    'empty_value'  => false,
                    'required'  => false,
                    'data'  => 1,
                ))
            ->add('memo', 'textarea',
                array(
                    'label' => '備考', 
                    'max_length' => $container->getParameter('int_len'),
                    'required'  => false
                ))
            ->add('status', 'choice',
                array(
                    'choices'   => array('1' => '有効', '2' => '無効'),
                    'label' => '状態', 
                    'max_length' => $container->getParameter('sint_len'),
                    'expanded'  => true,
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
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'validation_groups' => array('registration')
        );
    }
    
    public function getName()
    {
      return 'AdminSystem';
    }
    
}
