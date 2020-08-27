<?php

use Infrastructure\Admin\UI\Web\Controller\ListCategoriesController;
use Infrastructure\Common\Framework;
use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\EventListener\ErrorListener;
use Symfony\Component\HttpKernel\EventListener\ResponseListener;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$containerBuilder = new ContainerBuilder();
$containerBuilder->register('context', RequestContext::class);
$containerBuilder->register('matcher', UrlMatcher::class)
    ->setArguments(['%routes%', new Reference('context')]);
$containerBuilder->register('request_stack', RequestStack::class);

$containerBuilder->register('controller_resolver', ControllerResolver::class);
$containerBuilder->register('argument_resolver', ArgumentResolver::class);

$containerBuilder->register('listener.router', RouterListener::class)
    ->setArguments([new Reference('matcher'), new Reference('request_stack')]);
$containerBuilder->register('listener.response', ResponseListener::class)
    ->setArguments(['UTF-8']);
$containerBuilder->register('listener.exception', ErrorListener::class)
    ->setArguments(['Infrastructure\Admin\UI\Web\Controller\ErrorController::exception']);
$containerBuilder->register('dispatcher', EventDispatcher::class)
    ->addMethodCall('addSubscriber', [new Reference('listener.router')])
    ->addMethodCall('addSubscriber', [new Reference('listener.response')])
    ->addMethodCall('addSubscriber', [new Reference('listener.exception')]);

//$definition = new Definition(ListCategoriesController::class);
////$definition->setPublic(false);
//$definition->setAutowired(true);
//$definition->addArgument(3);
////$definition->setAutoconfigured(true);
//$containerBuilder->setDefinition('list_categories', $definition);
$containerBuilder->register('list_categories', ListCategoriesController::class)
    ->addArgument(3);

$containerBuilder->register('framework', Framework::class)
    ->setArguments([
        new Reference('dispatcher'),
        new Reference('controller_resolver'),
        new Reference('request_stack'),
        new Reference('argument_resolver'),
    ]);

return $containerBuilder;