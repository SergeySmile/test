<?php
declare(strict_types=1);

namespace App\Infrastructure\Admin\Repository;

use Admin\Domain\Model\Entity\Item;
use Admin\Domain\Model\Exception\ItemNotFoundException;
use Admin\Domain\Model\Repository\ItemRepository;
use Admin\Domain\Model\Value\ItemId;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;

/**
 * Class DoctrineItemRepository
 * @package App\Infrastructure\Admin\Repository
 */
final class DoctrineItemRepository implements ItemRepository
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
     * @param ItemId $itemId
     * @return Item|object
     * @throws ItemNotFoundException
     */
    public function byId(ItemId $itemId) : Item
    {
        $item = $this->repository->find((string) $itemId->asString());
        if ($item === null) {
            throw ItemNotFoundException::withId($itemId);
        }

        return $item;
    }

    /**
     * @param Item $item
     */
    public function save(Item $item) : void
    {
        $this->manager->persist($item);
    }
}