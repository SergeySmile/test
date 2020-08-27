<?php
declare(strict_types=1);

namespace Infrastructure\Admin\UI\Web\Controller;

use Admin\Application\Query\ListCategoriesQuery;
use Admin\Domain\Model\Repository\CategoryRepository;
use Infrastructure\Common\Bus\Query\QueryBus;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ListCategoriesController
 * @package Infrastructure\Admin\UI\Web\Controller
 */
final class ListCategoriesController
{
    private $queryBus;

    public function __construct(int $a)
    {
        $this->queryBus = $a;
    }

//    public function __construct(QueryBus $queryBus)

    public function __invoke(): ResponseInterface
    {
        var_dump($this->queryBus);exit;
//        $categories = $this->queryBus->ask(
//            new ListCategoriesQuery()
//        );
    }
}