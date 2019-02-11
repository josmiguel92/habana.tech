<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 * @Assert\Expression("this.getThirdCheckValue() in [this.CheckValue]",
 *     message="The value {{this.CheckValue}}.....")
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $airportPickup;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $flyNumber;

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
     * @ORM\Column(type="string", length=800, nullable=true)
     */
    private $pickupPlace;

    /**
     * @ORM\Column(type="time")
     */
    private $pickupTime;

    /**
     * @ORM\Column(type="date")
     */
    private $pickupDate;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bookingLang;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $returnTravel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $returnPickupPlace;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $returnPickupTime;


    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $returnPickupDate;

    /**
     * @var int $thirdCheckValue
     */
    private $firstCheckValue;

    /**
     * @var int $thirdCheckValue
     **/

    /**
     * @var int $thirdCheckValue
     **/
    private $secondCheckValue;

    /**
     * @var int $thirdCheckValue
     */
    private $thirdCheckValue;
    public $CheckValue;

    /**
     * @ORM\Column(type="integer")
     */
    private $peopleCount;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tourOption;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telephone;

    /**
     * @return int
     */
    public function getCheckValue()
    {
        return $this->CheckValue;
    }

    public function __construct()
    {
        $this->bookingTime = new \DateTime();
        //check the user/javascript send the form

        $this->firstCheckValue = rand(1,100);
        $this->secondCheckValue = rand(1,100);

        //TODO: dejar valor rand en thirdCheckValue
        $this->thirdCheckValue = $this->firstCheckValue * $this->secondCheckValue;
        //$this->thirdCheckValue = rand(1,100);

        if(isset($_SESSION['formTXCheckValue']))
        {
            $this->CheckValue = $_SESSION['formTXCheckValue'];

        }
        $_SESSION['formTXCheckValue'] = $this->firstCheckValue * $this->secondCheckValue;
        //echo  $this->thirdCheckValue ."|". $this->getCheckValue();

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

    public function getAirportPickup(): ?bool
    {
        return $this->airportPickup;
    }

    public function setAirportPickup(?bool $airportPickup): self
    {
        $this->airportPickup = $airportPickup;

        return $this;
    }

    public function getFlyNumber(): ?string
    {
        return $this->flyNumber;
    }

    public function setFlyNumber(?string $flyNumber): self
    {
        $this->flyNumber = $flyNumber;

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

    public function getReturnTravel(): ?bool
    {
        return $this->returnTravel;
    }

    public function setReturnTravel(?bool $returnTravel): self
    {
        $this->returnTravel = $returnTravel;

        return $this;
    }

    public function getReturnPickupPlace(): ?string
    {
        return $this->returnPickupPlace;
    }

    public function setReturnPickupPlace(?string $returnPickupPlace): self
    {
        $this->returnPickupPlace = $returnPickupPlace;

        return $this;
    }

    public function getReturnPickupTime(): ?\DateTimeInterface
    {
        return $this->returnPickupTime;
    }

    public function setReturnPickupTime(?\DateTimeInterface $returnPickupTime): self
    {
        $this->returnPickupTime = $returnPickupTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getFirstCheckValue(): int
    {
        return $this->firstCheckValue;
    }

    /**
     * @param int $firstCheckValue
     */
    public function setFirstCheckValue(int $firstCheckValue): void
    {
        $this->firstCheckValue = $firstCheckValue;
    }

    /**
     * @return int
     */
    public function getSecondCheckValue(): int
    {
        return $this->secondCheckValue;
    }

    /**
     * @param int $secondCheckValue
     */
    public function setSecondCheckValue(int $secondCheckValue): void
    {
        $this->secondCheckValue = $secondCheckValue;
    }

    /**
     * @return int
     */
    public function getThirdCheckValue(): int
    {
        return $this->thirdCheckValue;
    }

    /**
     * @param int $thirdCheckValue
     */
    public function setThirdCheckValue(int $thirdCheckValue): void
    {
        $this->thirdCheckValue = $thirdCheckValue;
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

    public function getTourOption(): ?bool
    {
        return $this->tourOption;
    }

    public function setTourOption(bool $tourOption): self
    {
        $this->tourOption = $tourOption;

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

    /**
     * @return mixed
     */
    public function getReturnPickupDate()
    {
        return $this->returnPickupDate;
    }

    /**
     * @param mixed $returnPickupDate
     */
    public function setReturnPickupDate($returnPickupDate): void
    {
        $this->returnPickupDate = $returnPickupDate;
    }



}
