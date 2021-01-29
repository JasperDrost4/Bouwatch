<?php

namespace App\Entity;

use App\Repository\ProductionLogRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductionLogRepository::class)
 */
class ProductionLog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Equipment::class, inversedBy="productionLogs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipment_id;

    /**
     * @ORM\Column(type="text")
     */
    private $log;

    /**
     * @ORM\Column(type="boolean")
     */
    private $successfull_produced;

    /**
     * @ORM\Column(type="text")
     */
    private $mac_adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $production_location;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipmentId(): ?Equipment
    {
        return $this->equipment_id;
    }

    public function setEquipmentId(?Equipment $equipment_id): self
    {
        $this->equipment_id = $equipment_id;

        return $this;
    }

    public function getLog(): ?string
    {
        return $this->log;
    }

    public function setLog(string $log): self
    {
        $this->log = $log;

        return $this;
    }

    public function getSuccessfullProduced(): ?bool
    {
        return $this->successfull_produced;
    }

    public function setSuccessfullProduced(bool $successfull_produced): self
    {
        $this->successfull_produced = $successfull_produced;

        return $this;
    }

    public function getMacAdress(): ?string
    {
        return $this->mac_adress;
    }

    public function setMacAdress(string $mac_adress): self
    {
        $this->mac_adress = $mac_adress;

        return $this;
    }

    public function getProductionLocation(): ?int
    {
        return $this->production_location;
    }

    public function setProductionLocation(int $production_location): self
    {
        $this->production_location = $production_location;

        return $this;
    }
}
