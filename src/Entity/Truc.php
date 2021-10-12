<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
/**
 * Class Truc
 *
 * @Entity
 * @ORM\Table(name="trucs")
 */
class Truc
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="id_truc", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_truc", type="string")
     */
    private string $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="age_truc", type="int")
     */
    private int $age;
}