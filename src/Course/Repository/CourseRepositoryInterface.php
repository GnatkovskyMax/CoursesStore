<?php

namespace App\Course\Repository;

use App\Entity\Course;

interface CourseRepositoryInterface
{
    public function findBySlug(string $slug): ?Course;

    /**
     * @return Course[]
     */
    public function findAll();
}
