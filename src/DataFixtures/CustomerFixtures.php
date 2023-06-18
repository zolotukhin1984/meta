<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist((new Customer())->setFirstName('Gennady')->setLastName('Zolotukhin'));
        $manager->persist((new Customer())->setFirstName('Elena')->setLastName('Zolotukhina'));
        $manager->persist((new Customer())->setFirstName('Anna')->setLastName('Zolotukhina'));

        $manager->flush();
    }
}
