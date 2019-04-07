<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
class CourseFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $faker= \Faker\Factory::create();

         for($i=0;$i<20; $i++)
         {
               $product = new Course($faker->title(), $faker->company(),0,$faker->slug());
               $manager->persist($product);

         }

        $manager->flush();

         }



}
