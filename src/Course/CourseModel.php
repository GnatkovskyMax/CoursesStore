<?php

namespace App\Course;

final class CourseModel
{
    private $id;
    private $slug;
    private $description;
    private $title;
    private $image;
    private $startDate;
    private $finishDate;

    public function __construct(int $id, string $slug)
    {
        $this->id = $id;
        $this->slug = $slug;
        //$this->name = $name;
//        $entity->getTitle(),
//            $entity->getDiscription(),
//            $entity->getImage(),
//            $entity->getStartDate(),
//            $entity->getFinishDate()
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getImage(): string
    {
        return $this->image;
    }

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function getFinishDate(): \DateTime
    {
        return $this->finishDate;
    }
}
