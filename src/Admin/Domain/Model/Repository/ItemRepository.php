<?php
declare(strict_types=1);

namespace Admin\Domain\Model\Repository;

use Admin\Domain\Model\Entity\Item;
use Admin\Domain\Model\Exception\ItemNotFoundException;
use Admin\Domain\Model\Value\ItemId;

/**
 * Interface ItemRepository
 * @package Admin\Domain\Model\Repository
 */
interface ItemRepository
{
    /**
     * @param ItemId $itemId
     * @return Item
     * @throws ItemNotFoundException
     */
    public function byId(ItemId $itemId): Item;

    /**
     * @param Item $item
     */
    public function save(Item $item): void;
}