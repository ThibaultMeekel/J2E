<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
/**
 * Class Promo
 *
 * @Entity
 * @ORM\Table(name="promos")
 */
class Promo
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="id_promo", type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="intitulé", type="text")
     */
    private string $intitule;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="promo")
     */
    public Collection $listeEtudiants;

    /**
     * @return string
     */
    public function getIntitule(): string
    {
        return $this->intitule;
    }

    /**
     * @param string $intitule
     */
    public function setIntitule(string $intitule): void
    {
        $this->intitule = $intitule;
    }

    /**
     * @param string $nom
     * @param Promo $promo
     */
    public function __construct(string $intitule)
    {
        $this->intitule = $intitule;
        $this->listeEtudiants = new ArrayCollection();
    }
}