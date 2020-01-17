<?php
/**
 * Created by PhpStorm.
 * User: walid
 * Date: 30/03/2018
 * Time: 16:12
 */

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Table(name="source")
 * @ORM\Entity
 */
class Source
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $libelle ;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $work ;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * @param mixed $work
     */
    public function setWork($work): void
    {
        $this->work = $work;
    }

    public function __toString()
    {
return $this->libelle;
    }


}