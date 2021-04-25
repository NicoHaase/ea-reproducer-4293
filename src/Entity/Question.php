<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @ORM\ManyToOne(targetEntity="Survey", inversedBy="questions")
     */
    private Survey $survey;

    /**
     * @ORM\Column
     */
    private ?string $title;

    /**
     * @ORM\Column(type="array")
     */
    private array $choices = [];

    /**
     * @ORM\Column(type="integer")
     */
    private int $position = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurvey(): Survey
    {
        return $this->survey;
    }

    public function setSurvey(Survey $survey): void
    {
        $this->survey = $survey;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }

    public function setChoices(array $choices): void
    {
        $this->choices = $choices;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }
}
