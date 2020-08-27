<?php
declare(strict_types = 1);

namespace Infrastructure\Admin\Repository;

use Admin\Domain\Model\Entity\Category;
use Admin\Domain\Model\Exception\CategoryNotFoundException;
use Admin\Domain\Model\Repository\CategoryRepository;
use Admin\Domain\Model\Value\CategoryId;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;

/**
 * Class DoctrineCategoryRepository
 * @package Infrastructure\Admin\Repository
 */
final class DoctrineCategoryRepository implements CategoryRepository
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
     * Responsible for loading the Aggregate by its ID
     * @param CategoryId $categoryId
     * @return Category|object
     * @throws CategoryNotFoundException
     */
    public function byId(CategoryId $categoryId) : Category
    {
        $category = $this->repository->find((string) $categoryId->asString());
        if ($category === null) {
            throw CategoryNotFoundException::withId($categoryId);
        }

        return $category;
    }

    /**
     * @param Category $category
     */
    public function save(Category $category) : void
    {
        $this->manager->persist($category);
    }
}