<?php

namespace App\DataFixtures;

use App\Entity\Lesson;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LessonFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker= \Faker\Factory::create();

        for($i=0;$i<20; $i++)
        {
            $product = new Lesson($faker->title(),
                $faker->slug(),
                $faker->sentence(15),
                $faker->imageUrl()
                ($faker->randomElement(\array_keys(CategoryFixtures::CATEGORIES))),
            );
            $manager->persist($product);

        }

        $manager->flush();

    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
    }
}
