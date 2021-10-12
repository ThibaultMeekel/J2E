<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
/**
 * Class Etudiant
 *
 * @Entity
 * @ORM\Table(name="etudiants")
 */
class Etudiant
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="id_etudiant", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_etudiant", type="text")
     */
    private string $nom;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return Promo
     */
    public function getPromo(): Promo
    {
        return $this->promo;
    }

    /**
     * @param Promo $promo
     */
    public function setPromo(Promo $promo): void
    {
        $this->promo = $promo;
    }

    /**
     * @var Promo
     *
     * @ORM\ManyToOne(targetEntity=Promo::class, fetch="EAGER")
     * @ORM\JoinColumn(name="promo_id", referencedColumnName="id_promo")
     */
    private Promo $promo;

    /**
     * @param string $nom
     * @param Promo $promo
     */
    public function __construct(string $nom, Promo $promo)
    {
        $this->nom = $nom;
        $this->promo = $promo;
    }
}