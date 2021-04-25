<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Survey
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @ORM\Column
     */
    private ?string $title;

    /**
     * @ORM\Column
     */
    private ?string $description;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="survey", cascade={"persist"})
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private iterable $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Question[]
     */
    public function getQuestions(): array
    {
        return $this->questions->toArray();
    }

    public function addQuestion(Question $question): void
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->setSurvey($this);
        }
    }

    public function removeQuestion(Question $question): void
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
        }
    }
}
