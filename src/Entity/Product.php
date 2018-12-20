<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $available;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $catgory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Store")
     * @ORM\JoinColumn(nullable=false)
     */
    private $store;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Media")
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\VAT", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $vat;

    public function __construct()
    {
        $this->image = new ArrayCollection();
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

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCatgory(): ?Category
    {
        return $this->catgory;
    }

    public function setCatgory(?Category $catgory): self
    {
        $this->catgory = $catgory;

        return $this;
    }

    public function getStore(): ?Store
    {
        return $this->store;
    }

    public function setStore(?Store $store): self
    {
        $this->store = $store;

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Media $image): self
    {
        if (!$this->image->contains($image)) {
            $this->image[] = $image;
        }

        return $this;
    }

    public function removeImage(Media $image): self
    {
        if ($this->image->contains($image)) {
            $this->image->removeElement($image);
        }

        return $this;
    }

    public function getVat(): ?VAT
    {
        return $this->vat;
    }

    public function setVat(VAT $vat): self
    {
        $this->vat = $vat;

        return $this;
    }
}
