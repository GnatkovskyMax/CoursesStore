<?php

namespace App\Course\Service;

use App\Course\CourseModel;
use App\Course\Collection;
use App\Exception\EntityNotFoundException;
use Faker\Factory;

final class FakeCoursePresentationService implements CoursePresentationServiceInterface
{
    private const CATEGORIES = [
        'it',
        'world',
        'sport',
        'science',
    ];

    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function findBySlug(string $slug): CourseModel
    {
        if (!\in_array($slug, self::CATEGORIES)) {
            throw new EntityNotFoundException(\sprintf('Categoy with slug "%s" not found', $slug));
        }

        $category = $this->createModel($slug);
        $category->setDescription($this->faker->sentence(15));

        return $category;
    }

    public function getAll(): Collection
    {
        $collection = new Collection();

        foreach (self::CATEGORIES as $categorySlug) {
            $category = $this->createModel($categorySlug);

            $collection->addCategory($category);
        }

        return $collection;
    }

    private function createModel(string $slug): CourseModel
    {
        return new CourseModel($this->faker->randomDigit, $slug, \ucfirst($slug));
    }
}
