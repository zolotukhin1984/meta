<?php

namespace App\DataFixtures;

use App\Entity\BookCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookCategoryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist((new BookCategory())->setTitle('Fantasy')->setSlug('fantasy'));
        $manager->persist((new BookCategory())->setTitle('Science')->setSlug('science'));
        $manager->persist((new BookCategory())->setTitle('Biography')->setSlug('biography'));

        $manager->flush();
    }
}
