<?php

namespace App\DomainEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ProductRemovedFromCart extends ShouldBeStored
{
    public function __construct(public int $productId)
    {
    }
}
