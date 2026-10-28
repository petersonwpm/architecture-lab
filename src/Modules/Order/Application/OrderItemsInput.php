<?php

namespace Core\Modules\Order\Application;

final class OrderItemsInput
{
    private array $items = [];

    public function add(OrderItemInput $item)
    {
        $this->items[$item->getId()] = $item;
    }

    public function get(string $orderItemId): ?OrderItemInput
    {
        return $this->items[$orderItemId] ?? null;
    }
}
