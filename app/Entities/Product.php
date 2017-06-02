<?php
namespace App\Entities;

use App\Entities\Money;

class Product
{

    /**
     * Value object in general case (guid/uuid)
     *
     * @var integer ProductId
     */
    private $id;

    /**
     * Value object in general case
     *
     * @var string
     */
    private $name;

    /**
     * Value object Money
     *
     * @var \App\Entities\Money
     */
    private $price;

    public function __construct(?int $id, ?string $name, Money $price)
    {
        $this->id = $id ?? null;
        $this->name = $name ?? null;
        $this->price = $price ?? null;
    }

    /**
     * Method Factory
     *
     * @return \App\Entities\Product
     */
    public static function addNewProduct(?int $id, ?string $name, Money $price)
    {
        // possibility to return from cache
        return new static($id, $name, $price);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
