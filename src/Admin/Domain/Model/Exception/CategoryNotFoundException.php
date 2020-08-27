<?php
declare(strict_types=1);

namespace Admin\Domain\Model\Exception;

use Admin\Domain\Model\Value\CategoryId;
use RuntimeException;

/**
 * Class CategoryNotFoundException
 * @package Admin\Domain\Model\Exception
 */
final class CategoryNotFoundException extends RuntimeException
{
    /**
     * @param CategoryId $categoryId
     * @return static
     */
    public static function withId(CategoryId $categoryId): self
    {
        return new self("CategoryView with ID {$categoryId->asString()} was not found.");
    }
}