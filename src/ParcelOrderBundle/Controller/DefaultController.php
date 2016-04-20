<?php

namespace ParcelOrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ParcelOrderBundle:Default:index.html.twig');
    }
}
