<?php

namespace App\DomainEvents\Aggregate;

use App\DomainEvents\CartCapacityExceeded;
use App\DomainEvents\ProductAddedToCart;
use App\DomainEvents\ProductRemovedFromCart;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class CartAggregateRoot extends AggregateRoot
{
    private array $products;

    public function addItem(int $productId, int $amount)
    {
        if (count($this->products) > 3) {
            $this->recordThat(new CartCapacityExceeded($this->products));
        } else {
            $this->recordThat(new ProductAddedToCart($productId, $amount));
        }
    }

    public function removeItem(int $productId)
    {
        $this->recordThat(new ProductRemovedFromCart($productId));
    }

    public function applyProductAddedToCart(ProductAddedToCart $event)
    {
        $this->products[] = $event->productId;
    }

    public function applyProductRemovedFromCart(ProductRemovedFromCart $event)
    {
        $this->products = array_filter(
            $this->products,
            fn ($productId) => $productId !== $event->productId
        );
    }
}
