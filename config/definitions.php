<?php

return [
    \Infrastructure\Admin\UI\Web\Controller\ListCategoriesController::class => DI\create()
        ->constructor(DI\get(\Admin\Application\Query\ListCategoriesQuery::class)),
];
