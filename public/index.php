<?php
declare(strict_types = 1);

use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/env.php';

//$routes = include __DIR__ . '/../src/app.php';
$container = include __DIR__ . '/../src/container.php';
$container->setParameter('routes', include __DIR__ . '/../src/app.php');
//$container->register('listener.content_length', \Infrastructure\Common\ContentLengthListener::class);
//$container->getDefinition('dispatcher')
//    ->addMethodCall('addSubscriber', array(new Reference('listener.content_length')));
//$container->setParameter('charset', 'UTF-8');
$request = Request::createFromGlobals();
$response = $container->get('framework')->handle($request);
$response->send();
