<?php

namespace Acme\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;

class SecuredController extends Controller {

    public function loginAction() {

        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('AcmeLoginBundle:Secured:login.html.twig', array(
            'last_username' => $this->get('request')
                    ->getSession()
                    ->get(SecurityContext::LAST_USERNAME),
            'error' => $error
        ));
    }

    public function securityCheckAction() {
        // The security layer will intercept this request
    }
    
    public function indexAction() {
        return $this->render('AcmeLoginBundle:Secured:index.html.twig');
    }
    
    public function logoutAction() {
        // The security layer will intercept this request
    }

}
