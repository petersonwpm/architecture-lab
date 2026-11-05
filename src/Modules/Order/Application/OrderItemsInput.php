<?php

declare(strict_types=1);

namespace Core\Modules\Order\Application;

final class OrderItemsInput
{
    /**
    *  @var list<OrderItemInput> $items
    */
    private array $items = [];

    public function add(OrderItemInput $item): self
    {
        array_push($this->items, $item);

        return $this;
    }

    public function get(string $orderItemId): ?OrderItemInput
    {
        $filtered = array_filter($this->items, function ($item) use ($orderItemId) {
            return $item->getProductId()->value() === $orderItemId;
        });

        return array_first($filtered);
    }
}
