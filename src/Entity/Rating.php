<?php

namespace App\Entity;

use App\Repository\RatingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RatingRepository::class)
 */
class Rating
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $starsReview;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $feedback;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="writtenRatings")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Listing::class, inversedBy="recievedRatings")
     */
    private $listing;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStarsReview(): ?int
    {
        return $this->starsReview;
    }

    public function setStarsReview(int $starsReview): self
    {
        $this->starsReview = $starsReview;

        return $this;
    }

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(?string $feedback): self
    {
        $this->feedback = $feedback;

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

    public function getListing(): ?Listing
    {
        return $this->listing;
    }

    public function setListing(?Listing $listing): self
    {
        $this->listing = $listing;

        return $this;
    }
}
