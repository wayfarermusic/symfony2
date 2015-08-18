<?php

namespace BaseCms\CommonBundle\Form\Master;

use BaseCms\CommonBundle\Form\AbstractContainerAwareType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdminLevelType extends AbstractContainerAwareType
{
    
    public function __construct()
    {
      
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                '1' => '管理者',
                '2' => '運営者',
            )
        ));
    }
    
    public function getParent(array $options)
    {
        return 'choice';
    }

    public function getName()
    {
        return 'admin_level';
    }
    
}
