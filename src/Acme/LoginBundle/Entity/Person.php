<?php

namespace Acme\LoginBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Person {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * 
     * @var integer $id
     */
    private $id;
    /**
     * @ORM\Column(type="datetime")
     * 
     * @var DateTime $createdAt
     */
    private $createdAt;
    /**
     * @ORM\Column(type="string")
     *
     * @var string username
     */
    private $username;

    /**
     * Gets the id.
     * 
     * @return string The id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Gets an object representing the date and time the user was created.
     * 
     * @return DateTime A DateTime object
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Gets the username.
     *
     * @return string The username.
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Sets the username.
     *
     * @param string $value The username.
     */
    public function setUsername($value) {
        $this->username = $value;
    }

    /**
     * Constructs a new instance of User
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
    }

}