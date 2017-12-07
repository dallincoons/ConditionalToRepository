<?php

namespace Refactoring;

class Movie
{
    /**
     * @var int
     */
    private $priceCode;

    const REGULAR = 1;
    const NEW_RELEASE = 2;
    const CHILDRENS = 3;

    public function __construct(int $priceCode)
    {
       $this->priceCode = $priceCode;
    }

    public function getCharge(int $daysRented)
    {
        $result = 0;
        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($daysRented) {
                    $result += ($daysRented - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += ($daysRented * 3);
                break;
            case Movie::CHILDRENS:
                $result += 1.5;
                if ($daysRented > 3) {
                    $result += ($daysRented - 3) * 1.5;
                }
                break;
        }
        return $result;
    }

    public function getPriceCode()
    {
        return $this->priceCode;
    }
}
