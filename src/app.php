<?php

use Infrastructure\Admin\UI\Web\Controller\ListCategoriesController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('list_categories', new Route(
        '/list_categories',
        [
            '_controller' => ListCategoriesController::class,
        ]
    )
);

return $routes;