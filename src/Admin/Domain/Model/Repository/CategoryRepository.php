<?php
declare(strict_types=1);

namespace Admin\Domain\Model\Repository;

use Admin\Domain\Model\Entity\Category;
use Admin\Domain\Model\Exception\CategoryNotFoundException;
use Admin\Domain\Model\Value\CategoryId;

/**
 * Interface CategoryRepository
 * @package Admin\Domain\Model\Repository
 */
interface CategoryRepository
{
    /**
     * @param CategoryId $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function byId(CategoryId $id): Category;

    /**
     * @param Category $item
     */
    public function save(Category $item): void;
}