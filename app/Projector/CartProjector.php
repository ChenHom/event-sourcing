<?php

namespace App\Projector;

use App\DomainEvents\ProductAddedToCart;
use App\DomainEvents\ProductRemovedFromCart;
use App\Models\ProjectionCart;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class CartProjector extends Projector
{
    public function onProductAddedToCart(ProductAddedToCart $event)
    {
        ProjectionCart::create(['product_id' => $event->productId]);
    }

    public function onProductRemovedFromCart(ProductRemovedFromCart $event)
    {
        ProjectionCart::where('product_id', $event->productId)->delete();
    }
}
