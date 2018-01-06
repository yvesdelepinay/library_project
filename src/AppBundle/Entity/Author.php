<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=255)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="birthplace", type="string", length=255)
     */
    private $birthplace;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime")
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="deathplace", type="string", length=255)
     */
    private $deathplace;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deathdate", type="datetime")
     */
    private $deathdate;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text")
     */
    private $biography;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Author
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Author
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return Author
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set birthplace
     *
     * @param string $birthplace
     *
     * @return Author
     */
    public function setBirthplace($birthplace)
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    /**
     * Get birthplace
     *
     * @return string
     */
    public function getBirthplace()
    {
        return $this->birthplace;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return Author
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set deathplace
     *
     * @param string $deathplace
     *
     * @return Author
     */
    public function setDeathplace($deathplace)
    {
        $this->deathplace = $deathplace;

        return $this;
    }

    /**
     * Get deathplace
     *
     * @return string
     */
    public function getDeathplace()
    {
        return $this->deathplace;
    }

    /**
     * Set deathdate
     *
     * @param \DateTime $deathdate
     *
     * @return Author
     */
    public function setDeathdate($deathdate)
    {
        $this->deathdate = $deathdate;

        return $this;
    }

    /**
     * Get deathdate
     *
     * @return \DateTime
     */
    public function getDeathdate()
    {
        return $this->deathdate;
    }

    /**
     * Set biography
     *
     * @param string $biography
     *
     * @return Author
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }
}

