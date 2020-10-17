<?php

namespace App\Entity;

use App\Repository\UnityMeasureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnityMeasureRepository::class)
 */
class UnityMeasure
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
    private $unityName;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="unitemeasure", orphanRemoval=true)
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnityName(): ?string
    {
        return $this->unityName;
    }

    public function setUnityName(string $unityName): self
    {
        $this->unityName = $unityName;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setUnitemeasure($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getUnitemeasure() === $this) {
                $article->setUnitemeasure(null);
            }
        }

        return $this;
    }
}
