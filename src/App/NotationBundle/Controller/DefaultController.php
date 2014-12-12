<?php

namespace App\NotationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppNotationBundle:Default:index.html.twig');
    }
}
