<?php

namespace OrmTeste\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="Place")
 */
class place
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
    private $nome;

    /**
     * @OneToMany(targetEntity="Service", mappedBy="place")
     *
     * @var Service[]
     **/
    private $services;

    /**
     * @ManyToMany(targetEntity="Category")
     * @JoinTable(name="places_categories",
     *      joinColumns={@JoinColumn(name="place_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="category_id", referencedColumnName="id")}
     *      )
     *
     * @var Category[]
     **/
    private $categories;

    public function __construct() {
        $this->services = new ArrayCollection();
        $this->categories = new ArrayCollection();
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
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    public function getCategories()
    {
        if (empty($this->categories)) {
            $this->categories = new ArrayCollection();
        }

        return $this->categories;
    }

    public function getServices()
    {
        if (empty($this->services)) {
            $this->services = new ArrayCollection();
        }

        return $this->services;
    }

}
