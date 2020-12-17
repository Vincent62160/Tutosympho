<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlogRepository::class)
 */
class Blog
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dascription;

    /**
     * @ORM\ManyToOne(targetEntity=Blogreply::class, inversedBy="blogs")
     */
    private $blogreplys;

    /**
     * @ORM\OneToMany(targetEntity=Blogcat::class, mappedBy="blog")
     */
    private $Blogcategorys;

    public function __construct()
    {
        $this->Blogcategorys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDascription(): ?string
    {
        return $this->dascription;
    }

    public function setDascription(string $dascription): self
    {
        $this->dascription = $dascription;

        return $this;
    }

    public function getBlogreplys(): ?blogReply
    {
        return $this->blogreplys;
    }

    public function setBlogreplys(?blogReply $blogreplys): self
    {
        $this->blogreplys = $blogreplys;

        return $this;
    }

    /**
     * @return Collection|blogcat[]
     */
    public function getBlogcategorys(): Collection
    {
        return $this->Blogcategorys;
    }

    public function addBlogcategory(blogcat $blogcategory): self
    {
        if (!$this->Blogcategorys->contains($blogcategory)) {
            $this->Blogcategorys[] = $blogcategory;
            $blogcategory->setBlog($this);
        }

        return $this;
    }

    public function removeBlogcategory(blogcat $blogcategory): self
    {
        if ($this->Blogcategorys->removeElement($blogcategory)) {
            // set the owning side to null (unless already changed)
            if ($blogcategory->getBlog() === $this) {
                $blogcategory->setBlog(null);
            }
        }

        return $this;
    }
}
