<?php

namespace MySystem\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MySystemHelloBundle:Default:hello.html.twig', array('name' => $name));
    }
}
