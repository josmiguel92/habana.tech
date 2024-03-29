<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $bookingTime;

    /**
     * @ORM\Column(type="string", length=250, nullable=false)
     */
    private $pickupPlace;

    /**
     * @ORM\Column(type="string", length=600, nullable=false)
     */
    private $pickupDetails;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $campaign;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clientName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clientEmail;

    /**
     * @ORM\Column(type="time")
     */
    private $pickupTime;

    /**
     * @ORM\Column(type="date")
     */
    private $pickupDate;
    //TODO: solo son validas fechas futuras


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bookingLang;

    /**
     * @ORM\Column(type="integer")
     */
    private $peopleCount;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $orderNumber;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $UserConfirmed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $TaxiConfirmed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsDone;

    /**
     * @return mixed
     */
    public function getClientMessage()
    {
        return $this->clientMessage;
    }

    /**
     * @param mixed $clientMessage
     */
    public function setClientMessage($clientMessage): void
    {
        $this->clientMessage = $clientMessage;
    }

    /**
     * @ORM\Column(type="string", length=600, nullable=true)
     */
    private $clientMessage;


    public function __construct()
    {
        $this->bookingTime = new \DateTime();
        $this->orderNumber = "vin-".date("md")."-".substr(uniqid(),8,4);
        $this->setUserConfirmed(false);
        $this->setTaxiConfirmed(false);
        $this->setIsDone(false);

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookingTime(): ?\DateTimeInterface
    {
        return $this->bookingTime;
    }

    public function setBookingTime(\DateTimeInterface $bookingTime): self
    {
        $this->bookingTime = $bookingTime;

        return $this;
    }

    public function getCampaign(): ?string
    {
        return $this->campaign;
    }

    public function setCampaign(?string $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    public function setClientName(string $clientName): self
    {
        $this->clientName = $clientName;

        return $this;
    }

    public function getClientEmail(): ?string
    {
        return $this->clientEmail;
    }

    public function setClientEmail(string $clientEmail): self
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    public function getPickupPlace(): ?string
    {
        return $this->pickupPlace;
    }

    public function setPickupPlace(?string $pickupPlace): self
    {
        $this->pickupPlace = $pickupPlace;

        return $this;
    }

    public function getPickupTime(): ?\DateTimeInterface
    {
        return $this->pickupTime;
    }

    public function setPickupTime(\DateTimeInterface $pickupTime): self
    {
        $this->pickupTime = $pickupTime;

        return $this;
    }

    public function getBookingLang(): ?string
    {
        return $this->bookingLang;
    }

    public function setBookingLang(?string $bookingLang): self
    {
        $this->bookingLang = $bookingLang;

        return $this;
    }


    public function getPeopleCount(): ?int
    {
        return $this->peopleCount;
    }

    public function setPeopleCount(int $peopleCount): self
    {
        $this->peopleCount = $peopleCount;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @param mixed $pickupDate
     */
    public function setPickupDate($pickupDate): void
    {
        $this->pickupDate = $pickupDate;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getUserConfirmed(): ?bool
    {
        return $this->UserConfirmed;
    }

    public function setUserConfirmed(bool $UserConfirmed): self
    {
        $this->UserConfirmed = $UserConfirmed;

        return $this;
    }

    public function getTaxiConfirmed(): ?bool
    {
        return $this->TaxiConfirmed;
    }

    public function setTaxiConfirmed(bool $TaxiConfirmed): self
    {
        $this->TaxiConfirmed = $TaxiConfirmed;

        return $this;
    }

    public function getIsDone(): ?bool
    {
        return $this->IsDone;
    }

    public function setIsDone(bool $IsDone): self
    {
        $this->IsDone = $IsDone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPickupDetails()
    {
        return $this->pickupDetails;
    }

    /**
     * @param mixed $pickupDetails
     */
    public function setPickupDetails($pickupDetails): void
    {
        $this->pickupDetails = $pickupDetails;
    }


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function calculatePrice()
    {
        if ($this->peopleCount > 1 and $this->peopleCount < 4)
            $this->setPrice(153);
        if ($this->peopleCount == 4)
            $this->setPrice(165);
        if ($this->peopleCount == 5)
            $this->setPrice(177);
        else $this->setPrice(0);

    }


}
