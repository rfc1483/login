    
public function registerAction() {
        $person = new Person();
        $person->setUsername("Miles Davis");

        $form = $this->get('form.factory')
                ->create(new PersonType(), $person);
        $request = $this->get('request');

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $manager = $this->get('doctrine')->getEntityManager();
                $manager->persist($person);
                $manager->flush();
                return $this->redirect($this->generateUrl('success'));
            }
        }
        return $this->render('AcmeLoginBundle:Secured:register.html.twig', array(
            'form' => $form->createView()
        ));
    }