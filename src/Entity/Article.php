<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        options:[
        "unsigned" => true,
            ]
        )]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $article_title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $article_text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $article_date_created = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $article_date_published = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $article_date_updated = null;

    #[ORM\Column(
        options:[
            "unsigned" => true,
        ]
    )]
    private ?int $article_created_by = null;

    #[ORM\Column(
        type:Types::BOOLEAN,
        options: [
            'default' => false,
        ]
    )]
    private ?bool $article_visible = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    public function setArticleTitle(string $article_title): static
    {
        $this->article_title = $article_title;

        return $this;
    }

    public function getArticleText(): ?string
    {
        return $this->article_text;
    }

    public function setArticleText(string $article_text): static
    {
        $this->article_text = $article_text;

        return $this;
    }

    public function getArticleDateCreated(): ?\DateTimeInterface
    {
        return $this->article_date_created;
    }

    public function setArticleDateCreated(\DateTimeInterface $article_date_created): static
    {
        $this->article_date_created = $article_date_created;

        return $this;
    }

    public function getArticleDatePublished(): ?\DateTimeInterface
    {
        return $this->article_date_published;
    }

    public function setArticleDatePublished(?\DateTimeInterface $article_date_published): static
    {
        $this->article_date_published = $article_date_published;

        return $this;
    }

    public function getArticleDateUpdated(): ?\DateTimeInterface
    {
        return $this->article_date_updated;
    }

    public function setArticleDateUpdated(?\DateTimeInterface $article_date_updated): static
    {
        $this->article_date_updated = $article_date_updated;

        return $this;
    }

    public function getArticleCreatedBy(): ?int
    {
        return $this->article_created_by;
    }

    public function setArticleCreatedBy(int $article_created_by): static
    {
        $this->article_created_by = $article_created_by;

        return $this;
    }

    public function isArticleVisible(): ?bool
    {
        return $this->article_visible;
    }

    public function setArticleVisible(bool $article_visible): static
    {
        $this->article_visible = $article_visible;

        return $this;
    }


}
