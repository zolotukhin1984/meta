<?php

namespace App\Service;

use App\Entity\Customer;
use App\Model\CustomerListItem;
use App\Model\CustomerListResponse;
use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\Criteria;

class CustomerService
{
    public function __construct(
        private readonly CustomerRepository $customerRepository
    ) {
    }

    public function getCustomers(): CustomerListResponse
    {
        $customers = $this->customerRepository->findBy([], ['last_name' => Criteria::ASC]);

        $items = array_map(
            fn (Customer $customer) => new CustomerListItem(
                $customer->getId(),
                $customer->getFirstName(),
                $customer->getLastName()
            ),
            $customers
        );

        return new CustomerListResponse($items);
    }
}
