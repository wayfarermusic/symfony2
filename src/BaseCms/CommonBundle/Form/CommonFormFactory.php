<?php

namespace BaseCms\CommonBundle\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormRegistryInterface;
use Symfony\Component\Form\ResolvedFormTypeFactoryInterface;

class CommonFormFactory extends FormFactory
{
    
    /**
     * Container
     * @var ContainerInterface
     */
    private $container;
    
    /**
     * @param FormRegistryInterface $registry
     * @param ResolvedFormTypeFactoryInterface $resolvedTypeFactory
     * @param ContainerInterface $container
     */
    public function __construct(FormRegistryInterface $registry, ResolvedFormTypeFactoryInterface $resolvedTypeFactory, ContainerInterface $container)
    {
        parent::__construct($registry, $resolvedTypeFactory);
        $this->container = $container;
    }
    
    /**
     * {@inheritdoc}
     */
    public function createNamedBuilder($name, $type = 'form', $data = null, array $options = array())
    {
        if ($type instanceof AbstractContainerAwareType) {
            $type->setContainer($this->container);
        }

        return parent::createNamedBuilder($name, $type, $data, $options);
    }
    
}
