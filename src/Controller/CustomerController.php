<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Model\CustomerListResponse;
use App\Service\CustomerService;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    public function __construct(
        private readonly CustomerService $customerService,
        private readonly EntityManagerInterface $em
    ) {
    }

    /**
     * @OA\Response(
     *     response="200",
     *     description="Returns customers",
     *
     *     @Model(type=CustomerListResponse::class)
     * )
     */
    #[Route(path: '/api/v1/book/customers', methods: ['GET'])]
    public function customers(): Response
    {
        $customers = $this->customerService->getCustomers();

        return $this->json($customers);
    }

    #[Route(path: '/add-new-customer')]
    public function addNewCustomer(): Response
    {
        $customer = new Customer();
        $customer->setFirstName('Spider');
        $customer->setLastName('Man');

        $this->em->persist($customer);
        $this->em->flush();

        return new Response();
    }
}
