<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
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
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chef;

    /**
     * @ORM\OneToMany(targetEntity=Catfood::class, mappedBy="menus")
     */
    private $catfoods;

    public function __construct()
    {
        $this->catfoods = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getChef(): ?string
    {
        return $this->chef;
    }

    public function setChef(string $chef): self
    {
        $this->chef = $chef;

        return $this;
    }

    /**
     * @return Collection|Catfood[]
     */
    public function getCatfoods(): Collection
    {
        return $this->catfoods;
    }

    public function addCatfood(Catfood $catfood): self
    {
        if (!$this->catfoods->contains($catfood)) {
            $this->catfoods[] = $catfood;
            $catfood->setMenus($this);
        }

        return $this;
    }

    public function removeCatfood(Catfood $catfood): self
    {
        if ($this->catfoods->removeElement($catfood)) {
            // set the owning side to null (unless already changed)
            if ($catfood->getMenus() === $this) {
                $catfood->setMenus(null);
            }
        }

        return $this;
    }
}
