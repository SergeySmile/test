<?php
declare(strict_types=1);

namespace Infrastructure\Admin\Doctrine\Type;

use Admin\Domain\Model\Value\ItemId;
use Ramsey\Uuid\Doctrine\UuidType;

final class ItemIdType extends UuidType
{
    public const NAME = ItemId::class;
}