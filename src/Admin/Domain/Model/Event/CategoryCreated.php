<?php

namespace Admin\Domain\Model\Event;

use Infrastructure\Common\Bus\Event\DomainEvent;

class CategoryCreated extends DomainEvent
{
    private string $name;
    private string $description;

    public function __construct(
        string $id,
        string $name,
        string $description,
        string $eventId = null,
        string $occurredOn = null
    )
    {
        parent::__construct($id, $eventId, $occurredOn);

        $this->name = $name;
        $this->description = $description;
    }

    public static function eventName(): string
    {
        return 'category.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn): CategoryCreated
    {
        return new self(
            $aggregateId,
            $body['name'],
            $body['description'],
            $eventId,
            $occurredOn
        );
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}