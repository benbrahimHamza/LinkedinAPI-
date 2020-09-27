<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Experience;
use Faker;

/**
 * This fixture is used for testing only
 * Uses Faker to randomize data and insert them as dummy Experiences
 */
class ExperienceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Instance of faker to start faking
        $faker = Faker\Factory::create('fr_FR');

        // This date represents the first experience date and will be incremented to stay plausible
        $initialDate = new \DateTime("2014-06-06");

        // Time to fake it
        for ($i=0; $i<10; $i++) {
            // Random number of months after the starting date
            
            $randomEndingDate = date_add($initialDate, date_interval_create_from_date_string($faker->randomDigit ." months"));
            // New Experience instance with random data
            $experience = new Experience();
            $experience->setName($faker->realText($maxNbChars = 100, $indexSize = 2));
            $experience->setStartingDate($initialDate);
            $experience->setEndingDate($randomEndingDate);
            $experience->setDescription($faker->realText($maxNbChars = 200, $indexSize = 2));

            var_dump($experience);

            // Persist the new experience, classic stuff
            $manager->persist($experience);

            // Set a new starting date so as not to overlap with other experience starting dates
            $initialDate = date_add($randomEndingDate, date_interval_create_from_date_string($faker->randomDigit ." months"));
        }

        // Insert all into the database
        $manager->flush();
    }
}
