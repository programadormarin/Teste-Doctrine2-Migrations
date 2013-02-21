<?php

namespace OrmTeste\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="Category")
 */
class Category
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     *
     * @var integer
     **/
    private $id;

    /**
     * @Column(type="string")
     *
     * @var string
     **/
    private $title;

    /**
     * @ManyToMany(targetEntity="Place", inversedBy="categories")
     *
     * @var Place[]
     **/
    private $places;

    public function __construct() {
        $this->places = new ArrayCollection();
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getPlaces()
    {
        if (empty($this->places)) {
            $this->places = new ArrayCollection();
        }

        return $this->places;
    }
}