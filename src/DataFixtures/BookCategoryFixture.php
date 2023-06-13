<?php

namespace App\DataFixtures;

use App\Entity\BookCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookCategoryFixture extends Fixture
{
    public const SCIENCE_CATEGORY = 'science';
    public const FANTASY_CATEGORY = 'fantasy';

    public function load(ObjectManager $manager): void
    {
        $categories = [
            self::SCIENCE_CATEGORY => (new BookCategory())->setTitle('Science')->setSlug('science'),
            self::FANTASY_CATEGORY => (new BookCategory())->setTitle('Fantasy')->setSlug('fantasy')
        ];

        foreach ($categories as $category) {
            $manager->persist($category);
        }

        $manager->persist((new BookCategory())->setTitle('Biography')->setSlug('biography'));

        $manager->flush();

        foreach ($categories as $code => $category) {
            $this->addReference($code, $category);
        }
    }
}
