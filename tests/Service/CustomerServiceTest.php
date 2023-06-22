<?php

namespace App\Tests\Service;

use App\Entity\Customer;
use App\Model\CustomerListItem;
use App\Model\CustomerListResponse;
use App\Repository\CustomerRepository;
use App\Service\CustomerService;
use App\Tests\AbstractTestCase;
use Doctrine\Common\Collections\Criteria;

class CustomerServiceTest extends AbstractTestCase
{
    public function testGetCustomers(): void
    {
        $repository = $this->createMock(CustomerRepository::class);
        $repository->expects($this->once())
            ->method('findBy')
            ->with([], ['last_name' => Criteria::ASC])
            ->willReturn([
                (new Customer())
                    ->setFirstName('Gennady')
                    ->setLastName('Zolotukhin')
            ]);

        $service = new CustomerService($repository);
        $expected = new CustomerListResponse([
            new CustomerListItem(7, 'Gennady', 'Zolotukhin')
        ]);

        $actual = $service->getCustomers();

        $this->assertEquals($expected, $actual);
    }
}
