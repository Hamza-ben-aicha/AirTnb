<?php

namespace App\Entity;

use App\Repository\ListingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListingRepository::class)
 */
class Listing
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
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $beds;

    /**
     * @ORM\Column(type="integer")
     */
    private $guests;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="date")
     */
    private $availableFrom;

    /**
     * @ORM\Column(type="date")
     */
    private $availableUntil;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="listings")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $amenities = [];

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="listing")
     */
    private $picturesUlrs;

    /**
     * @ORM\OneToMany(targetEntity=Rating::class, mappedBy="listing")
     */
    private $recievedRatings;

    public function __construct()
    {
        $this->picturesUlrs = new ArrayCollection();
        $this->recievedRatings = new ArrayCollection();
    }
    public function __toString() {
        return $this->id;
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getBeds(): ?int
    {
        return $this->beds;
    }

    public function setBeds(int $beds): self
    {
        $this->beds = $beds;

        return $this;
    }

    public function getGuests(): ?int
    {
        return $this->guests;
    }

    public function setGuests(int $guests): self
    {
        $this->guests = $guests;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAvailableFrom(): ?\DateTimeInterface
    {
        return $this->availableFrom;
    }

    public function setAvailableFrom(\DateTimeInterface $availableFrom): self
    {
        $this->availableFrom = $availableFrom;

        return $this;
    }

    public function getAvailableUntil(): ?\DateTimeInterface
    {
        return $this->availableUntil;
    }

    public function setAvailableUntil(\DateTimeInterface $availableUntil): self
    {
        $this->availableUntil = $availableUntil;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAmenities(): ?array
    {
        return $this->amenities;
    }

    public function setAmenities(?array $amenities): self
    {
        $this->amenities = $amenities;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPicturesUlrs(): Collection
    {
        return $this->picturesUlrs;
    }

    public function addPicturesUlr(Picture $picturesUlr): self
    {
        if (!$this->picturesUlrs->contains($picturesUlr)) {
            $this->picturesUlrs[] = $picturesUlr;
            $picturesUlr->setListing($this);
        }

        return $this;
    }

    public function removePicturesUlr(Picture $picturesUlr): self
    {
        if ($this->picturesUlrs->removeElement($picturesUlr)) {
            // set the owning side to null (unless already changed)
            if ($picturesUlr->getListing() === $this) {
                $picturesUlr->setListing(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rating[]
     */
    public function getRecievedRatings(): Collection
    {
        return $this->recievedRatings;
    }

    public function addRecievedRating(Rating $recievedRating): self
    {
        if (!$this->recievedRatings->contains($recievedRating)) {
            $this->recievedRatings[] = $recievedRating;
            $recievedRating->setListing($this);
        }

        return $this;
    }

    public function removeRecievedRating(Rating $recievedRating): self
    {
        if ($this->recievedRatings->removeElement($recievedRating)) {
            // set the owning side to null (unless already changed)
            if ($recievedRating->getListing() === $this) {
                $recievedRating->setListing(null);
            }
        }

        return $this;
    }
}
