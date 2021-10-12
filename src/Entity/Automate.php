<?php

namespace App\Entity;
/**
 *Class Automate
 *
 * @Entity
 * @ORM\Table(name="etudiants")
 */
class Automate
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(name="id_automate", type="integer")
     * @ORM\GeneratedValue()
     */
    private int $id;
}