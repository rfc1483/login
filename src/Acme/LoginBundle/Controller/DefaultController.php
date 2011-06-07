<?php

namespace Acme\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('AcmeLoginBundle:Default:index.html.twig');
    }

    public function publicAction() {
        return $this->render('AcmeLoginBundle:Default:public.html.twig');
    }

}
