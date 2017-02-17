<?php

namespace AppBundle\Domain\Money;


class BaseCurrency
{
    private $name;
    private $code;
    private $rate;
    private $amount;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code)
    {
        $this->code = $code;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate)
    {
        $this->rate = $rate;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }
}