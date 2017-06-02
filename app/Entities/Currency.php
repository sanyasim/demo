<?php
namespace App\Entities;

class Currency
{

    private $isoCode;

    public function __construct(string $isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    public function equals(Currency $currency)
    {
        return $currency->getIsoCode() === $this->getIsoCode();
    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }

    private function setIsoCode(string $isoCode)
    {
        if (! preg_match('/^[A-Z]{3}$/', $isoCode)) {
            throw new \InvalidArgumentException();
        }
        
        $this->isoCode = $isoCode;
    }
}
