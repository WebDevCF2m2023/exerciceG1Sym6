<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        options:[
            "unsigned" => true,
        ]
    )]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $comment_post_id = null;

    #[ORM\Column(length: 1024)]
    private ?string $comment_text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $comment_date = null;

    #[ORM\Column(
        type:Types::BOOLEAN,
        options: [
            'default' => true,
        ]
    )]
    private ?bool $comment_visible = null;

    #[ORM\Column(
        options:[
            "unsigned" => true,
        ]
    )]
    private ?int $comment_made_by = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentPostId(): ?int
    {
        return $this->comment_post_id;
    }

    public function setCommentPostId(int $comment_post_id): static
    {
        $this->comment_post_id = $comment_post_id;

        return $this;
    }

    public function getCommentText(): ?string
    {
        return $this->comment_text;
    }

    public function setCommentText(string $comment_text): static
    {
        $this->comment_text = $comment_text;

        return $this;
    }

    public function getCommentDate(): ?\DateTimeInterface
    {
        return $this->comment_date;
    }

    public function setCommentDate(\DateTimeInterface $comment_date): static
    {
        $this->comment_date = $comment_date;

        return $this;
    }

    public function isCommentVisible(): ?bool
    {
        return $this->comment_visible;
    }

    public function setCommentVisible(bool $comment_visible): static
    {
        $this->comment_visible = $comment_visible;

        return $this;
    }

    public function getCommentMadeBy(): ?int
    {
        return $this->comment_made_by;
    }

    public function setCommentMadeBy(int $comment_made_by): static
    {
        $this->comment_made_by = $comment_made_by;

        return $this;
    }
}
