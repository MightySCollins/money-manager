<?php

namespace AppBundle\Domain\Money;


class GBP extends BaseCurrency
{
    protected $name = 'British Pound';
    protected $code = 'GBP';
    protected $rate = 1;
}