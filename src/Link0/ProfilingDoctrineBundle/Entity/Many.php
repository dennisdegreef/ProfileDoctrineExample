<?php

namespace Link0\ProfilingDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Many
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Link0\ProfilingDoctrineBundle\Entity\ManyRepository")
 */
class Many
{
    /**
     * @var integer
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
     * @ORM\ManyToOne(targetEntity="One", inversedBy="manies", cascade="persist")
     */
    private $one;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Many
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
     * @param One $one
     */
    public function setOne(One $one)
    {
        $this->one = $one;
    }

    /**
     * @return One
     */
    public function getOne()
    {
        return $this->one;
    }
}
