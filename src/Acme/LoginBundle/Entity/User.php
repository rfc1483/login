<?php

namespace Acme\LoginBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User implements UserInterface {

    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $username;

    // ...
}

namespace Acme\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Acme\FormBundle\Repository\UserRepository")
 */
class Users {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $user_id;
    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $name;




    /**
     * Get user_id
     *
     * @return integer $userId
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
}