<?php
declare(strict_types=1);

namespace App\Infrastructure\Admin\Repository;

use Admin\Application\Value\Value\CategoryView;
use Admin\Domain\Model\Entity\Category;
use Admin\Domain\Model\Exception\CategoryNotFoundException;
use Admin\Domain\Model\Repository\CategoryViewRepository;
use Admin\Domain\Model\Value\CategoryId;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;

final class DoctrineCategoryViewRepository implements CategoryViewRepository
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var ObjectRepository
     */
    private $repository;

    /**
     * DoctrineCategoryRepository constructor.
     * @param ObjectManager $manager
     * @param ObjectRepository $repository
     */
    public function __construct(ObjectManager $manager, ObjectRepository $repository)
    {
        $this->manager = $manager;
        $this->repository = $repository;
    }

    /**
     * @param CategoryId $categoryId
     * @return CategoryView|object
     * @throws CategoryNotFoundException
     */
    public function byId(CategoryId $categoryId): CategoryView
    {
        /** @var Category $category */
        $category = $this->repository->find((string) $categoryId->asString());
        if ($category === null) {
            throw CategoryNotFoundException::withId($categoryId);
        }

        return $this->newCategoryView($category);
    }

    /**
     * @return CategoryView[]
     * @throws CategoryNotFoundException
     */
    public function all(): array
    {
        $categories = $this->repository->findAll();
        if ($categories === null) {
            throw CategoryNotFoundException::withId($categories);
        }

        $categoryViews = [];
        foreach ($categories as $category) {
            $categoryViews[] = $this->newCategoryView($category);
        }

        return $categoryViews;
    }

    private function newCategoryView(Category $category)
    {
        return new CategoryView(
            $category->id()->asString(),
            $category->name(),
            $category->description()
        );
    }
}