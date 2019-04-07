<?php

namespace App\Course\Service;

use App\Course\CourseMapper;
use App\Course\CourseModel;
use App\Course\Collection;
use App\Course\Repository\CourseRepositoryInterface;
use App\Exception\EntityNotFoundException;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class CoursePresentationService implements CoursePresentationServiceInterface
{
    private $categoryRepository;
    private $authorizationChecker;

    public function __construct(
        CourseRepositoryInterface $categoryRepository,
        AuthorizationCheckerInterface $authorizationChecker
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function findBySlug(string $slug): CourseModel
    {
        if ('it' === $slug && !$this->authorizationChecker->isGranted('ROLE_USER')) {
            throw $this->createCategoryNotFoundException($slug);
        }

        $category = $this->categoryRepository->findBySlug($slug);

        if (null === $category) {
            throw $this->createCategoryNotFoundException($slug);
        }

        return CourseMapper::entityToModel($category);
    }

    public function getAll(): Collection
    {
        $categories = $this->categoryRepository->findAll();
        $collection = new Collection();

        foreach ($categories as $category) {
            if ($category->getSlug() === 'it' && !$this->authorizationChecker->isGranted('ROLE_USER')) {
                continue;
            }

            $collection->addCategory(
                CourseMapper::entityToModel($category)
            );
        }

        return $collection;
    }

    private function createCategoryNotFoundException(string $slug)
    {
        return new EntityNotFoundException(\sprintf('Categoy with slug "%s" not found', $slug));
    }
}
