<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TextRepository")
 */
class Text
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5100, nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $page_num;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $line_num;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annex;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $annex_title;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $part;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $part_title;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $article;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $article_title;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=510, nullable=true)
     */
    private $title_title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPageNum(): ?int
    {
        return $this->page_num;
    }

    public function setPageNum(?int $page_num): self
    {
        $this->page_num = $page_num;

        return $this;
    }

    public function getLineNum(): ?int
    {
        return $this->line_num;
    }

    public function setLineNum(?int $line_num): self
    {
        $this->line_num = $line_num;

        return $this;
    }

    public function getAnnex(): ?string
    {
        return $this->annex;
    }

    public function setAnnex(?string $annex): self
    {
        $this->annex = $annex;

        return $this;
    }

    public function getAnnexTitle(): ?string
    {
        return $this->annex_title;
    }

    public function setAnnexTitle(?string $annex_title): self
    {
        $this->annex_title = $annex_title;

        return $this;
    }

    public function getPart(): ?string
    {
        return $this->part;
    }

    public function setPart(?string $part): self
    {
        $this->part = $part;

        return $this;
    }

    public function getPartTitle(): ?string
    {
        return $this->part_title;
    }

    public function setPartTitle(?string $part_title): self
    {
        $this->part_title = $part_title;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getArticleTitle(): ?string
    {
        return $this->article_title;
    }

    public function setArticleTitle(?string $article_title): self
    {
        $this->article_title = $article_title;

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

    public function getTitleTitle(): ?string
    {
        return $this->title_title;
    }

    public function setTitleTitle(?string $title_title): self
    {
        $this->title_title = $title_title;

        return $this;
    }
}
