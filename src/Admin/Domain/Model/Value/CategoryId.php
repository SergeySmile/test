<?php
declare(strict_types = 1);

namespace Admin\Domain\Model\Value;

use Ramsey\Uuid\Uuid;

/**
 * Class CategoryId
 * @package Admin\Domain\Model\Value
 */
final class CategoryId extends Uuid
{
    /**
     * @return string
     */
    public function asString(): string
    {
        return $this->__toString();
    }
}