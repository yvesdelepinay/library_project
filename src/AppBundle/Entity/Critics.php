<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Critics
 *
 * @ORM\Table(name="critics")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CriticsRepository")
 */
class Critics
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
     * @ORM\ManyToOne(targetEntity="Books", inversedBy="critics")
     * @ORM\JoinColumn(name="books_id", referencedColumnName="id")
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }


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
     * @return Critics
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
