<?php

namespace AppBundle\Domain\Money;

use AppBundle\Exception\ValidationException;

class BaseCurrency
{
    const MONEY_FORMAT = '%i';
    protected $name;
    protected $code;
    protected $rate;
    protected $amount;

    public function __construct(float $amount)
    {
        $this->setAmount($amount);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getFormattedAmount(): string
    {
        return money_format($this::MONEY_FORMAT, $this->amount);
    }

    private function setAmount(float $amount)
    {
        $this->validateAmount($amount);
        $this->amount = $amount;
    }

    private function validateAmount(float $amount)
    {
        if ($amount < 0) {
            throw new ValidationException('Amount cannot be negative');
        }
        if ($amount == 0) {
            throw new ValidationException('Amount must be more than 0');
        }
    }

    public function add(BaseCurrency $money)
    {
        return new static($this->getAmount() + $money->getAmount());
    }

    public function subtract(BaseCurrency $money)
    {
        if ($money >= $this->getAmount()) {
            throw new ValidationException('You cannot take away more than the original amount');
        }
        return new static($this->getAmount() + $money->getAmount());
    }
}