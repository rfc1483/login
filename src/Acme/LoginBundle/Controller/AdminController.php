<?php

namespace Acme\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeLoginBundle:Admin:index.html.twig');
    }
}
