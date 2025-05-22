<?php
namespace Acme;
class Basket {
    private $catalogue;
    private $deliveryRules;
    private $offers;
    private $items = [];

    public function __construct(array $catalogue, DeliveryRules $deliveryRules, array $offers = []) {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add(string $code): void {
        if (!isset($this->catalogue[$code])) {
            die("Product code $code not found in catalogue");
        }
        $this->items[] = $this->catalogue[$code];
    }

    public function total(): float {
        $items = $this->items;
		
		$subtotal = 0.0;
		foreach ($items as $item) {
			$subtotal += $item->price;
		}

		$totalDiscount = 0.0;
		foreach ($this->offers as $offer) {
			$totalDiscount += $offer->apply($items);
		}
		
		$total = $subtotal - $totalDiscount;	
        
        $delivery = $this->deliveryRules->getDeliveryCharge($total);

        return round($total + $delivery, 2);
    }
}
