<?php

namespace App\Tests\Service;

use App\Entity\Customer;
use App\Model\BookListItem;
use App\Model\CustomerListItem;
use App\Model\CustomerListResponse;
use App\Repository\CustomerRepository;
use App\Service\CustomerService;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

class CustomerServiceTest extends TestCase
{
    public function testGetCustomers(): void
    {
        $repository = $this->createMock(CustomerRepository::class);
        $repository->expects($this->once())
            ->method('findBy')
            ->with([], ['last_name' => Criteria::ASC])
            ->willReturn([
                (new Customer())
                    ->setId(7)
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
