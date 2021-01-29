<?php

namespace App\Entity;

use App\Repository\RMAOrderRuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RMAOrderRuleRepository::class)
 */
class RMAOrderRule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RMAOrder::class, inversedBy="RmaOrderRules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rma_order_id;

    /**
     * @ORM\ManyToOne(targetEntity=Parts::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $part_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity=Equipment::class)
     */
    private $Equipment_id;

    public function __construct()
    {
        $this->Equipment_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRmaOrderId(): ?RMAOrder
    {
        return $this->rma_order_id;
    }

    public function setRmaOrderId(?RMAOrder $rma_order_id): self
    {
        $this->rma_order_id = $rma_order_id;

        return $this;
    }

    public function getPartId(): ?Parts
    {
        return $this->part_id;
    }

    public function setPartId(?Parts $part_id): self
    {
        $this->part_id = $part_id;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipmentId(): Collection
    {
        return $this->Equipment_id;
    }

    public function addEquipmentId(Equipment $equipmentId): self
    {
        if (!$this->Equipment_id->contains($equipmentId)) {
            $this->Equipment_id[] = $equipmentId;
        }

        return $this;
    }

    public function removeEquipmentId(Equipment $equipmentId): self
    {
        $this->Equipment_id->removeElement($equipmentId);

        return $this;
    }
}
