<?php

namespace App\DataFixtures;

use App\Entity\Lesson;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LessonFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker= \Faker\Factory::create();

        for($i=0;$i<20; $i++)
        {
            $product = new Lesson($faker->title(), $faker->slug(),$faker->description(),$faker->video());
            $manager->persist($product);

        }

        $manager->flush();

    }
}
