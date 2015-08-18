<?php

namespace Acme\HelloBundle\Form;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;

abstract class AbstractContainerAwareType extends AbstractType implements ContainerAwareInterface
{
    
    /**
     * Container
     * @var ContainerInterface
     */
    protected $container;
    
    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * Get Container
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }
    
}
