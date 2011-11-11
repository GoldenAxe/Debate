<?php

namespace AlfaDev\Debate\NewsBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('AlfaDevDebateNewsBundle:Admin:index.html.twig');
    }
}
