<?php

namespace Matthimatiker\OpcacheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MatthimatikerOpcacheBundle:Default:index.html.twig', array('name' => $name));
    }
}
