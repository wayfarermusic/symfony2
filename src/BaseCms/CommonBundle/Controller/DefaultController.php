<?php

namespace BaseCms\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BaseCmsCommonBundle:Default:index.html.twig', array('name' => $name));
    }
}
