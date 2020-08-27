<?php
declare(strict_types=1);

namespace Admin\Domain\Model\Value;

final class Price
{
    private int $priceInCents;

    private function __construct(int $priceInCents)
    {
        $this->priceInCents = $priceInCents;
    }

    public static function fromInt(int $priceInCents): self
    {
        return new self($priceInCents);
    }

    public function asInt(): int
    {
        return $this->priceInCents;
    }
}