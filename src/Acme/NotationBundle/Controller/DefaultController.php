<?php

namespace Acme\NotationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeNotationBundle:Default:index.html.twig', array('name' => $name));
    }
}
