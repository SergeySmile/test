<?php
declare(strict_types=1);

namespace Admin\Application\Query;

use Admin\Application\Value\Value\CategoryView;
use Admin\Domain\Model\Repository\CategoryViewRepository;
use Infrastructure\Common\Bus\Query\QueryHandler;

class ListCategoriesQueryHandler implements QueryHandler
{
    /**
     * @var CategoryViewRepository
     */
    private $categoryRepository;

    public function __construct($categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param ListCategoriesQuery $listCategoriesQuery
     * @return CategoryView[]
     */
    public function handle(ListCategoriesQuery $listCategoriesQuery)
    {
        return $this->categoryRepository->all();
    }
}