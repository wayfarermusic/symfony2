<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HelloBundle\Entity\Hello;
use Symfony\Component\HttpFoundation\Request;

class HelloController extends Controller
{
    public function indexAction(Request $request)
    {
        //フォームの作成
        $hello = new Hello;
        
        $hello->name = 'Test';
        $hello->setEmail = 'rirakkuma.music@gmail.com';
        
        $form = $this->createForm($hello)
            ->add('name', 'text')
            ->add('email', 'text')
            ->getForm();
        
        return $this->render('AcmeHelloBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
