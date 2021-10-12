<?php

namespace App\Entity;
/**
 * Class Echantillon
 *
 * @Entity
 * @ORM\Table(name="Echantillon")
 */

class Echantillon
{
    //////////////////////////////////////////////////
    // ATTRIBUTES
    //////////////////////////////////////////////////

    /**
     * @var int
     * @ORM\Column(name="idEchantillon", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $idEchantillon;

    /**
     * @var Patient
     * @ORM\Column(name="idPatient", type="integer")
     */
    private Patient $patient;

    /**
     * @var float
     * @ORM\Column(name="quantite", type="float")
     */
    private float $quantite;

    //////////////////////////////////////////////////
    // CONSTRUCTOR
    //////////////////////////////////////////////////

    public function __construct(Patient $patient, float $quantite) {
        $this->patient = $patient;
        $this->quantite = $quantite;
    }

    //////////////////////////////////////////////////
    // GETTERS AND SETTERS
    //////////////////////////////////////////////////

    /**
     * @return int
     */
    public function getIdEchantillon(): int
    {
        return $this->idEchantillon;
    }

    /**
     * @param int $idEchantillon
     */
    public function setIdEchantillon(int $idEchantillon): void
    {
        $this->idEchantillon = $idEchantillon;
    }

    /**
     * @return Patient
     */
    public function getPatient(): Patient
    {
        return $this->patient;
    }

    /**
     * @param Patient $patient
     */
    public function setPatient(Patient $patient): void
    {
        $this->patient = $patient;
    }

    /**
     * @return float
     */
    public function getQuantite(): float
    {
        return $this->quantite;
    }

    /**
     * @param float $quantite
     */
    public function setQuantite(float $quantite): void
    {
        $this->quantite = $quantite;
    }



}