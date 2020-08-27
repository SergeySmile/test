<?php

namespace Infrastructure\Common\Aggregate;

use Infrastructure\Common\Bus\Event\DomainEvent;

abstract class AggregateRoot
{
    private array $domainEvents = [];

    final public function pullDomainEvents(): array
    {
        $domainEvents = $this->domainEvents;
        $this->domainEvents = [];

        return $domainEvents;
    }

    final protected function record(DomainEvent $domainEvent): void
    {
        $this->domainEvents[] = $domainEvent;
    }

    public function recordedEvents()
    {
        // Clients can find out what happened by calling this method
        return $this->domainEvents;
    }
}