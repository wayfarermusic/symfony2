<?php

namespace BaseCms\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BaseCmsAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
