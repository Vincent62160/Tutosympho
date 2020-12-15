<?php

namespace App\Entity;

use App\Repository\BlogcatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlogcatRepository::class)
 */
class Blogcat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $namecat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamecat(): ?string
    {
        return $this->namecat;
    }

    public function setNamecat(string $namecat): self
    {
        $this->namecat = $namecat;

        return $this;
    }
}
