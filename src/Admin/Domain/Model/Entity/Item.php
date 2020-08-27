<?php
declare(strict_types = 1);

namespace Admin\Domain\Model\Entity;

use Admin\Domain\Model\Value\ItemId;
use Admin\Domain\Model\Value\Price;
use Infrastructure\Common\Aggregate\AggregateRoot;

/**
 * Class Item
 * @package Admin\Domain\Model\Entity
 */
final class Item  extends AggregateRoot
{
    /**
     * @var ItemId
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

    /**
     * @var Category;
     */
    private $category;

    /**
     * @var Price
     */
    private $price;
}