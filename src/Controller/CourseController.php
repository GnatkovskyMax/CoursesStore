<?php

namespace App\Controller;

use App\Course\Service\CoursePresentationServiceInterface;
use App\Exception\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CourseController extends AbstractController
{
    private $coursePresentation;

    public function __construct(CoursePresentationServiceInterface $coursePresentation)
    {
        $this->coursePresentation = $coursePresentation;
    }

    /**
     * @Route("/category/{slug}", name="category_show", requirements={"slug"="^[A-Za-z0-9-_]+$"})
     */
    public function show(string $slug): Response
    {
        try {
            $course = $this->coursePresentation->findBySlug($slug);
        } catch (EntityNotFoundException $e) {
            throw $this->createNotFoundException('Course not found', $e);
        }

        return $this->render('course/show.html.twig', [
            'course' => $course,
        ]);
    }

    public function list(string $active): Response
    {
        $courses = $this->coursePresentation->getAll();

        return $this->render('course/list.html.twig', [
            'active' => $active,
            'courses' => $courses,
        ]);
    }
}
