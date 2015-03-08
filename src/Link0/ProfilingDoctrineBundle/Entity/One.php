<?php

namespace Link0\ProfilingDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * One
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Link0\ProfilingDoctrineBundle\Entity\OneRepository")
 */
class One
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
     * @var Many[]
     *
     * @ORM\OneToMany(targetEntity="Many", mappedBy="one", cascade="persist")
     */
    private $manies;

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
     * @return One
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
     * @return Many[]
     */
    public function getManies()
    {
        return $this->manies;
    }


}
