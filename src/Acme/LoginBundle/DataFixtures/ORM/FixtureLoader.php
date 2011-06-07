<?php

namespace Acme\LoginBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Acme\LoginBundle\Entity\User;
use Acme\LoginBundle\Entity\Role;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class FixtureLoader implements FixtureInterface {

    public function load($manager) {
        // create the ROLE_ADMIN role
        $role = new Role();
        $role->setName('ROLE_ADMIN');

        $manager->persist($role);

        // create the ROLE_USER role
        $role = new Role();
        $role->setName('ROLE_USER');

        $manager->persist($role);

        // create a user
        $user = new User();
        $user->setUsername('john.doe');
        $user->setSalt(md5(time()));

        // encode and set the password for the user,
        // these settings match our config
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('admin', $user->getSalt());
        $user->setPassword($password);

        $user->getUserRoles()->add($role);

        $manager->persist($user);

        $manager->flush();
    }

}
