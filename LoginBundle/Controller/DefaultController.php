<?php

namespace AlfaDev\Debate\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('AlfaDevDebateLoginBundle:Default:index.html.twig');
    }
}
