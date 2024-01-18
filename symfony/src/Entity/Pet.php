<?php

namespace App\Entity;

use App\Repository\PetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PetRepository::class)]
class Pet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $Name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Image = null;

    #[ORM\Column(length: 255)]
    private ?string $Sex = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Birth = null;

    #[ORM\Column(length: 255)]
    private ?string $Race = null;

    #[ORM\ManyToOne(inversedBy: 'pets')]
    private ?Customer $Customer = null;

    #[ORM\OneToMany(mappedBy: 'Pet', targetEntity: Meet::class)]
    private Collection $meets;

    public function __construct()
    {
        $this->meets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->Sex;
    }

    public function setSex(string $Sex): static
    {
        $this->Sex = $Sex;

        return $this;
    }

    public function getBirth(): ?\DateTimeInterface
    {
        return $this->Birth;
    }

    public function setBirth(?\DateTimeInterface $Birth): static
    {
        $this->Birth = $Birth;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->Race;
    }

    public function setRace(string $Race): static
    {
        $this->Race = $Race;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->Customer;
    }

    public function setCustomer(?Customer $Customer): static
    {
        $this->Customer = $Customer;

        return $this;
    }

    /**
     * @return Collection<int, Meet>
     */
    public function getMeets(): Collection
    {
        return $this->meets;
    }

    public function addMeet(Meet $meet): static
    {
        if (!$this->meets->contains($meet)) {
            $this->meets->add($meet);
            $meet->setPet($this);
        }

        return $this;
    }

    public function removeMeet(Meet $meet): static
    {
        if ($this->meets->removeElement($meet)) {
            // set the owning side to null (unless already changed)
            if ($meet->getPet() === $this) {
                $meet->setPet(null);
            }
        }

        return $this;
    }
}
