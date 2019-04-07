<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker= \Faker\Factory::create();

        for($i=0;$i<5; $i++)
        {
            $product = new User($faker->email(),
                                $faker->password(),
                                $faker->imageUrl(),
                                $faker->firstName(),
                                $faker->lastName()
                                   );
            $manager->persist($product);

        }

        $manager->flush();

    }
}
