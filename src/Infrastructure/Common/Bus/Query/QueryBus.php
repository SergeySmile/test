<?php
declare(strict_types=1);

namespace Infrastructure\Common\Bus\Query;

interface QueryBus
{
    public function ask(Query $query): ?Response;
}