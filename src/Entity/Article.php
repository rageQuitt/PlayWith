<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Author", inversedBy="articles")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $imageArticleUrl;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $videoUrl;


    // ... getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this ->title;
    }

    public function getContent(): ?string
    {
        return $this ->content;
    }

    public function getImageArticleUrl(): ?string
    {
        return $this->imageArticleUrl;
    }

    public function getVideoUrl(): ?string
    {
        return $this->videoUrl;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function getAuthorId(): ?int
    {
        return $this->author ? $this->author->getId() : null;
    }

    public function getAuthorName(): ?string
    {
        return $this->author ? $this->author->getName() : null;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
    
    public function setImageArticleUrl(string $setImageArticleUrl): self
    {
        $this->setImageArticleUrl = $setImageArticleUrl;

        return $this;
    }
}
