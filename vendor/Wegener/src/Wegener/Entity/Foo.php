<?php

namespace Wegener\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Foo
 *
 * @ORM\Table(name="foo")
 * @ORM\Entity
 */
class Foo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="bar", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $bar;


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
     * Set bar
     *
     * @param string $bar
     * @return Foo
     */
    public function setBar($bar)
    {
        $this->bar = $bar;
    
        return $this;
    }

    /**
     * Get bar
     *
     * @return string 
     */
    public function getBar()
    {
        return $this->bar;
    }
}
