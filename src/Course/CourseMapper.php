<?php

namespace App\Course;

use App\Entity\Category;

final class CourseMapper
{
    public static function entityToModel(Category $entity): CourseModel
    {
        $model = new CourseModel(
            $entity->getId(),
            $entity->getSlug(),
            $entity->getTitle(),
            $entity->getDiscription(),
            $entity->getImage(),
            $entity->getStartDate(),
            $entity->getFinishDate()

        );


        return $model;
    }
}
