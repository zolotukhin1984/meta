<?php

namespace App\Model;

class CustomerListResponse
{
    /**
     * @var CustomerListItem[]
     */
    private array $items;

    /**
     * @param CustomerListItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return CustomerListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }


}
