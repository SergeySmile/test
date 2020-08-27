<?php

namespace Admin\Domain\Model\Repository;

use Admin\Application\Value\Value\CategoryView;
use Admin\Domain\Model\Exception\CategoryNotFoundException;
use Admin\Domain\Model\Value\CategoryId;

interface CategoryViewRepository
{
    /**
     * @param CategoryId $categoryId
     * @return CategoryView
     */
    public function byId(CategoryId $categoryId): CategoryView;

    /**
     * @throws CategoryNotFoundException
     * @return CategoryView[]
     */
    public function all(): array;
}