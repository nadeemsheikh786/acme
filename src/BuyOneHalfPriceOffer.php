<?php
namespace Acme;

class BuyOneHalfPriceOffer implements OfferInterface {
    private $productCode;

    public function __construct(string $productCode) {
        $this->productCode = $productCode;
    }

    public function apply(array $items): float {
        $count = 0;
        $price = 0.0;

        foreach ($items as $item) {
            if ($item->code === $this->productCode) {
                $count++;
                $price = $item->price;
            }
        }
		
        return floor($count / 2) * ($price / 2); // we are formulating here to get the total discount price for every second item in cart ( Every second item half off if the prouct code matches )
    }
}
