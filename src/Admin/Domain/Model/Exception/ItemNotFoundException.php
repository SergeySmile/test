<?php
declare(strict_types=1);

namespace Admin\Domain\Model\Exception;

use Admin\Domain\Model\Value\ItemId;
use RuntimeException;

/**
 * Class ItemNotFoundException
 * @package Admin\Domain\Model\Exception
 */
final class ItemNotFoundException extends RuntimeException
{
    /**
     * @param ItemId $itemId
     * @return static
     */
    public static function withId(ItemId $itemId): self
    {
        return new self("Item with ID {$itemId->asString()} was not found.");
    }
}