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
        $customer = (new Customer())->setFirstName('Gennady')->setLastName('Zolotukhin');
        $this->setEntityId($customer, 7);

        $repository = $this->createMock(CustomerRepository::class);
        $repository->expects($this->once())
            ->method('findAllSortedByLastName')
            ->willReturn([$customer]);

        $service = new CustomerService($repository);
        $actual = $service->getCustomers();

        $expected = new CustomerListResponse([
            new CustomerListItem(7, 'Gennady', 'Zolotukhin')
        ]);

        $this->assertEquals($expected, $actual);
    }
}
