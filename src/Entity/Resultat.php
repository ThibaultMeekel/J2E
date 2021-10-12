<?php

namespace App\Entity;

/**
 * Class Resultat
 *
 * @Entity
 * @ORM\Table(name="Resultat")
 */

class Resultat
{
    //////////////////////////////////////////////////
    // ATTRIBUTES
    //////////////////////////////////////////////////
    /**
     * @var int
     * @ORM\Column(name="idResultat", type="string")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $idResultat;

    /**
     * @var Echantillon
     * @ORM\Column(name="idEchantillon", type="integer")
     */
    private Echantillon $echantillon;

    /**
     * @var float
     * @ORM\Column(name="valeur", type="float")
     */
    private float $valeur;

    /**
     * @var string
     * @ORM\Column(name="type", type="string")
     */
    private string $type;

    //////////////////////////////////////////////////
    // CONSTRUCTOR
    //////////////////////////////////////////////////

    public function __construct(Echantillon $echantillon, float $valeur, string $type) {
        $this->echantillon = $echantillon;
        $this->valeur = $valeur;
        $this->type = $type;
    }

    //////////////////////////////////////////////////
    // GETTERS AND SETTERS
    //////////////////////////////////////////////////

    /**
     * @return int
     */
    public function getIdResultat(): int
    {
        return $this->idResultat;
    }

    /**
     * @param int $idResultat
     */
    public function setIdResultat(int $idResultat): void
    {
        $this->idResultat = $idResultat;
    }

    /**
     * @return Echantillon
     */
    public function getEchantillon(): Echantillon
    {
        return $this->echantillon;
    }

    /**
     * @param Echantillon $echantillon
     */
    public function setEchantillon(Echantillon $echantillon): void
    {
        $this->echantillon = $echantillon;
    }

    /**
     * @return float
     */
    public function getValeur(): float
    {
        return $this->valeur;
    }

    /**
     * @param float $valeur
     */
    public function setValeur(float $valeur): void
    {
        $this->valeur = $valeur;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }


}