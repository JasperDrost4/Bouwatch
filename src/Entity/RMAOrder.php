<?php

namespace App\Entity;

use App\Repository\RMAOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RMAOrderRepository::class)
 */
class RMAOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $customer;

    /**
     * @ORM\Column(type="text")
     */
    private $handled_by;

    /**
     * @ORM\Column(type="text")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=RMAOrderRule::class, mappedBy="rma_order_id")
     */
    private $RmaOrderRules;

  

    public function __construct()
    {
        $this->RmaOrderRules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getHandledBy(): ?string
    {
        return $this->handled_by;
    }

    public function setHandledBy(string $handled_by): self
    {
        $this->handled_by = $handled_by;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|RMAOrderRule[]
     */
    public function getRmaOrderRules(): Collection
    {
        return $this->RmaOrderRules;
    }

    public function addRmaOrderRule(RMAOrderRule $rmaOrderRule): self
    {
        if (!$this->RmaOrderRules->contains($rmaOrderRule)) {
            $this->RmaOrderRules[] = $rmaOrderRule;
            $rmaOrderRule->setRmaOrderId($this);
        }

        return $this;
    }

    public function removeRmaOrderRule(RMAOrderRule $rmaOrderRule): self
    {
        if ($this->RmaOrderRules->removeElement($rmaOrderRule)) {
            // set the owning side to null (unless already changed)
            if ($rmaOrderRule->getRmaOrderId() === $this) {
                $rmaOrderRule->setRmaOrderId(null);
            }
        }

        return $this;
    }

    
}
