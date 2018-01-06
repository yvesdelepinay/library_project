<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Critic
 *
 * @ORM\Table(name="critic")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CriticRepository")
 */
class Critic
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
     * @ORM\Column(name="critic", type="text")
     */
    private $critic;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="critic")
     */
    private $book;

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
     * Set critic
     *
     * @param string $critic
     *
     * @return Critic
     */
    public function setCritic($critic)
    {
        $this->critic = $critic;

        return $this;
    }

    /**
     * Get critic
     *
     * @return string
     */
    public function getCritic()
    {
        return $this->critic;
    }
}
