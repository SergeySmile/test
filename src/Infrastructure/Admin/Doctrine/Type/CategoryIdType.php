<?php
declare(strict_types=1);

namespace Infrastructure\Admin\Doctrine\Type;

use Admin\Domain\Model\Value\CategoryId;
use Ramsey\Uuid\Doctrine\UuidType;

final class CategoryIdType extends UuidType
{
    public const NAME = CategoryId::class;
}