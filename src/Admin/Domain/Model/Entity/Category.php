<?php
declare(strict_types = 1);

namespace Admin\Domain\Model\Entity;

use Admin\Domain\Model\Event\CategoryCreated;
use Admin\Domain\Model\Value\CategoryId;
use Infrastructure\Common\Aggregate\AggregateRoot;

/**
 * Class CategoryView
 * @package Admin\Domain\Model\Entity
 */
final class Category extends AggregateRoot
{
    /**
     * @var CategoryId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    public static function create(
        CategoryId $id,
        string $name,
        string $description
    ) {
        $category = new self();
        $category->id = $id;
        $category->name = $name;
        $category->description = $description;

        // When state changes, we additionally "record" a domain event
        $category->record(new CategoryCreated(
            $id->asString(),
            $name,
            $description
        ));

        return $category;
    }

    public function updateName(string $newName): void
    {
        // @todo
        $this->name = $newName;
    }

    public function id(): CategoryId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

}