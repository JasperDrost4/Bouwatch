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
     * @ORM\ManyToOne(targetEntity=Parts::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $part_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Equipment::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Equipment_id;

    /**
     * @ORM\ManyToOne(targetEntity=RMAOrder::class, inversedBy="RMAOrderRules")
     */
    private $RMAOrderID;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEquipmentId(): ?Equipment
    {
        return $this->Equipment_id;
    }

    public function setEquipmentId(?Equipment $Equipment_id): self
    {
        $this->Equipment_id = $Equipment_id;

        return $this;
    }

    public function getRMAOrderID(): ?RMAOrder
    {
        return $this->RMAOrderID;
    }

    public function setRMAOrderID(?RMAOrder $RMAOrderID): self
    {
        $this->RMAOrderID = $RMAOrderID;

        return $this;
    }

}
