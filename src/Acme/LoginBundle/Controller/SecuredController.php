<?php

namespace Acme\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Acme\LoginBundle\Entity\User;
use Acme\LoginBundle\Form\UserType;
use Acme\LoginBundle\Entity\Role;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

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

    public function registerAction() {

        $user = new User();

        $form = $this->get('form.factory')
                ->create(new UserType(), $user);
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $manager = $this->get('doctrine')->getEntityManager();
                $role = new Role();
                $role = $manager->getRepository('AcmeLoginBundle:Role')->findOneByName('ROLE_USER');
                
                // Assign salt to the user
                $user->setSalt(md5(time()));

                // encode and set the password for the user,
                // these settings match our config
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);
                $user->getUserRoles()->add($role);

                $manager->persist($user);
                $manager->flush();
                return $this->redirect($this->generateUrl('success'));
            }
        }
        return $this->render('AcmeLoginBundle:Secured:register.html.twig', array(
            'form' => $form->createView()
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

    public function successAction() {
        return $this->render('AcmeLoginBundle:Secured:success.html.twig');
    }

}
