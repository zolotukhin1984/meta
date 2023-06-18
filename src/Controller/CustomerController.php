<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    public function __construct(private readonly CustomerRepository $customerRepository)
    {
    }

    #[Route(path: '/customer')]
    public function index(): Response
    {
        $customers = $this->customerRepository->findAll();

        return $this->json($customers);
    }

    #[Route(path: '/add-new-customer')]
    public function addNewCustomer(): Response
    {
        $customer = new Customer();
        $customer->setFirstName('Spider');
        $customer->setLastName('Man');

        $this->customerRepository->save($customer, true);

        return new Response();
    }
}
