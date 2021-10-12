<?php

namespace App\Entity;

/**
 * Class Patient
 *
 * @Entity
 * @ORM\Table(name="Patient")
 */
class Patient
{
    //////////////////////////////////////////////////
    // ATTRIBUTES
    //////////////////////////////////////////////////

    /**
     * @var int
     * @ORM\Column(name="idPatient", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $idPatient;

    /**
     * @var String
     * @ORM\Column(name="nom", type="string")
     */
    private String $nom;

    /**
     * @var String
     * @ORM\Column(name="prenom", type="string")
     */
    private String $prenom;

    /**
     * @var bool
     * @ORM\Column(name="genre", type="boolean")
     */
    private bool $genre;

    /**
     * @var int
     * @ORM\Column(name="age", type="integer")
     */
    private int $age;

    //////////////////////////////////////////////////
    // CONSTRUCTOR
    //////////////////////////////////////////////////

    public function __construct(String $nom, String $prenom, bool $genre, int $age) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->genre = $genre;
        $this->age = $age;
    }

    //////////////////////////////////////////////////
    // GETTERS AND SETTERS
    //////////////////////////////////////////////////

    /**
     * @return int
     */
    public function getIdPatient(): int
    {
        return $this->idPatient;
    }

    /**
     * @param int $idPatient
     */
    public function setIdPatient(int $idPatient): void
    {
        $this->idPatient = $idPatient;
    }

    /**
     * @return String
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return bool
     */
    public function isGenre(): bool
    {
        return $this->genre;
    }

    /**
     * @param bool $genre
     */
    public function setGenre(bool $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}