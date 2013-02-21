<?php

namespace OrmTeste\Entities;

/**
 * @Entity
 * @Table(name="Service")
 */
class Service
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
    private $name;

    /**
     * @ManyToOne(targetEntity="Place", inversedBy="services")
     *
     * @var Place
     **/
    private $place;

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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \Place $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return \Place
     */
    public function getPlace()
    {
        return $this->place;
    }

}
