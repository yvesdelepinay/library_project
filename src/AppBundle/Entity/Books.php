<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BooksRepository")
 */
class Books
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="text")
     */
    private $abstract;

    /**
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="books")
     * @ORM\JoinColumn(name="categories_id", referencedColumnName="id")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity="Critics", inversedBy="books")
     * @ORM\JoinColumn(name="critics_id", referencedColumnName="id")
     */
    private $critics;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Authors", cascade={"persist"})
     */
      private $authors;


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
     * Set name
     *
     * @param string $name
     *
     * @return Books
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set abstract
     *
     * @param string $abstract
     *
     * @return Books
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }
}
