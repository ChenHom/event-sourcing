<?php

namespace App\DomainEvents;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ProductAddedToCart extends ShouldBeStored
{
    public function __construct(public int $productId, public int $amount)
    {
    }
}
