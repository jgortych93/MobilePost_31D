<?php

namespace ParcelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ParcelBundle\Model\ParcelInterface;
/**
 * Parcel
 *
 * @ORM\Table(name="parcel")
 * @ORM\Entity(repositoryClass="ParcelBundle\Repository\ParcelRepository")
 */
class Parcel implements ParcelInterface
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
     * @ORM\Column(name="Notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="parcel_hash", type="integer", unique=true)
     */
    
	private $weight;

	/**
     * @var double
     *
     * @ORM\Column(name="weight", type="double")
     */
	 
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
     * Set notes
     *
     * @param string $notes
     *
     * @return Parcel
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

}

