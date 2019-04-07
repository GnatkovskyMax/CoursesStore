<?php

namespace App\Course\Service;

use App\Course\CourseModel;
use App\Course\Collection;

interface CoursePresentationServiceInterface
{
    public function findBySlug(string $slug): CourseModel;

    public function getAll(): Collection;
}
