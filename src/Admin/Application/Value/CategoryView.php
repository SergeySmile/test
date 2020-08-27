<?php
declare(strict_types=1);

namespace Admin\Application\Value\Value;

/**
 * Class CategoryView
 * @package Infrastructure\Admin\DTO
 */
final class CategoryView
{
    /**
     * @var string
     */
    private $categoryId;
    /**
     * @var string
     */
    private $name;
    /**
     * @var
     */
    private $description;

    /**
     * CategoryView constructor.
     * @param string $categoryId
     * @param string $name
     * @param string $description
     */
    public function __construct(
        string $categoryId,
        string $name,
        string $description
    ) {
        $this->categoryId = $categoryId;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function categoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }
}