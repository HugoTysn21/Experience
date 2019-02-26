<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $createdBy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatarFileName;

    /**
     * @Assert\Image(
     *     maxSize = "500000k",
     *     mimeTypesMessage = "Max size is 50Mb."
     * )
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $introduction;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $introductionPost;

    /**
     * @ORM\Column(type="text")
     */
    private $contentTwo;

    /**
     * @ORM\Column(type="text")
     */
    private $contentThree;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $contentFour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAvatarFileName(): ?string
    {
        return $this->avatarFileName;
    }

    public function setAvatarFileName(string $avatarFileName): self
    {
        $this->avatarFileName = $avatarFileName;

        return $this;
    }

    public function getAvatar(): ?UploadedFile
    {
        return $this->avatar;
    }

    public function setAvatar(UploadedFile $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction(string $introduction): self
    {
        $this->introduction = $introduction;

        return $this;
    }

    public function getIntroductionPost(): ?string
    {
        return $this->introductionPost;
    }

    public function setIntroductionPost(string $introductionPost): self
    {
        $this->introductionPost = $introductionPost;

        return $this;
    }

    public function getContentTwo(): ?string
    {
        return $this->contentTwo;
    }

    public function setContentTwo(string $contentTwo): self
    {
        $this->contentTwo = $contentTwo;

        return $this;
    }

    public function getContentThree(): ?string
    {
        return $this->contentThree;
    }

    public function setContentThree(string $contentThree): self
    {
        $this->contentThree = $contentThree;

        return $this;
    }

    public function getContentFour(): ?string
    {
        return $this->contentFour;
    }

    public function setContentFour(?string $contentFour): self
    {
        $this->contentFour = $contentFour;

        return $this;
    }
}
