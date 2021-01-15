<?php

namespace App\Entity;

use App\Repository\TechniqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TechniqueRepository::class)
 */
class Technique
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
     * @ORM\OneToMany(targetEntity=Painting::class, mappedBy="technique")
     */
    private $paintings;

    public function __construct()
    {
        $this->paintings = new ArrayCollection();
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

    /**
     * @return Collection|Painting[]
     */
    public function getPaintings(): Collection
    {
        return $this->paintings;
    }

    public function addPainting(Painting $painting): self
    {
        if (!$this->paintings->contains($painting)) {
            $this->paintings[] = $painting;
            $painting->setTechnique($this);
        }

        return $this;
    }

    public function removePainting(Painting $painting): self
    {
        if ($this->paintings->removeElement($painting)) {
            // set the owning side to null (unless already changed)
            if ($painting->getTechnique() === $this) {
                $painting->setTechnique(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
