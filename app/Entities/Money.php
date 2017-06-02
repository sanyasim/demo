<?php
namespace App\Entities;

use App\Entities\Currency;

final class Money
{

    private $amount;

    private $currency;

    public function __construct($amount, Currency $currency)
    {
        //validation embeded 
        $this->setAmount(intval($amount));
        $this->setCurrency($currency);
    }

    public static function fromMoney(self $money)
    {
        // immutable
        return new self($money->getAmount(), $money->getCurrency());
    }

    public static function fromCurrency(Currency $currency)
    {
        // immutable
        return new self(0, $currency);
    }

    public function increaseAmountBy($amount)
    {
        // immutable
        return new self($this->getAmount() + intval($amount), $this->getCurrency());
    }

    public function add(self $money)
    {
        if (! $money->getCurrency()->equals($this->getCurrency())) {
            throw new \InvalidArgumentException();
        }
        
        // immutable
        return new self($money->getAmount() + $this->getAmount(), $this->getCurrency());
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function equals(self $money)
    {
        return $money->getCurrency()->equals($this->getCurrency()) && $money->getAmount() === $this->getAmount();
    }

    private function setAmount($amount): void
    {
        // cast to int
        $this->amount = (int) $amount;
    }

    private function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }
}
