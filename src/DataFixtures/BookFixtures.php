<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $scienceCategory = $this->getReference(BookCategoryFixture::SCIENCE_CATEGORY);
        $fantasyCategory = $this->getReference(BookCategoryFixture::FANTASY_CATEGORY);

        $book = (new Book())
            ->setTitle('Harry Potter')
            ->setPublicationDate(new DateTime('2019-04-01'))
            ->setMeap(false)
            ->setAuthors(['Joan Rouling'])
            ->setSlug('harry-potter')
            ->setCategories(new ArrayCollection([$scienceCategory, $fantasyCategory]))
            ->setImage('https://ic.pics.livejournal.com/sasha_bogdanov/8603983/929961/929961_1000.jpg');

        $manager->persist($book);
        $manager->flush();

    }

    public function getDependencies(): array
    {
        return [
            BookCategoryFixture::class
        ];
    }
}
