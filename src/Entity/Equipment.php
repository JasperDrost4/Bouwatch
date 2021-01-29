<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $type;

    /**
     * @ORM\Column(type="date")
     */
    private $production_date;

    /**
     * @ORM\Column(type="text")
     */
    private $model;

    /**
     * @ORM\Column(type="text")
     */
    private $revision;

    /**
     * @ORM\Column(type="text")
     */
    private $serial_number;

    /**
     * @ORM\Column(type="text")
     */
    private $statusstatus;

    /**
     * @ORM\OneToMany(targetEntity=ProductionLog::class, mappedBy="equipment_id")
     */
    private $productionLogs;

    public function __construct()
    {
        $this->productionLogs = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getProductionDate(): ?\DateTimeInterface
    {
        return $this->production_date;
    }

    public function setProductionDate(\DateTimeInterface $production_date): self
    {
        $this->production_date = $production_date;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getRevision(): ?string
    {
        return $this->revision;
    }

    public function setRevision(string $revision): self
    {
        $this->revision = $revision;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(string $serial_number): self
    {
        $this->serial_number = $serial_number;

        return $this;
    }

    public function getStatusstatus(): ?string
    {
        return $this->statusstatus;
    }

    public function setStatusstatus(string $statusstatus): self
    {
        $this->statusstatus = $statusstatus;

        return $this;
    }

    /**
     * @return Collection|ProductionLog[]
     */
    public function getProductionLogs(): Collection
    {
        return $this->productionLogs;
    }

    public function addProductionLog(ProductionLog $productionLog): self
    {
        if (!$this->productionLogs->contains($productionLog)) {
            $this->productionLogs[] = $productionLog;
            $productionLog->setEquipmentId($this);
        }

        return $this;
    }

    public function removeProductionLog(ProductionLog $productionLog): self
    {
        if ($this->productionLogs->removeElement($productionLog)) {
            // set the owning side to null (unless already changed)
            if ($productionLog->getEquipmentId() === $this) {
                $productionLog->setEquipmentId(null);
            }
        }

        return $this;
    }

  
}
