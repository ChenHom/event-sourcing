<?php

namespace App\DomainEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CartCapacityExceeded extends ShouldBeStored
{
    public function __construct(public array $products)
    {
    }
}
