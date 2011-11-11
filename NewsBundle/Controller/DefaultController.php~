<?php

namespace AlfaDev\Debate\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('AlfaDevDebateNewsBundle:Default:index.html.twig', array('posts' => $this->retrievePosts()));
    }
    
    public function retrievePosts()
    {
       
        $repository = $this->getDoctrine()
        ->getRepository('AlfaDevDebateNewsBundle:Post');

        $posts = $repository->findAll();
        
        return $posts;
       	
    }
    	
}
