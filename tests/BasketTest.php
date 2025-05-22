<?php
use PHPUnit\Framework\TestCase;
use Acme\Product;
use Acme\Basket;
use Acme\DeliveryRules;
use Acme\BuyOneHalfPriceOffer;

class BasketTest extends TestCase {
    private array $catalogue;

    protected function setUp(): void {
        $this->catalogue = [
            "R01" => new Product("R01", "Red Widget", 32.95),
            "G01" => new Product("G01", "Green Widget", 24.95),
            "B01" => new Product("B01", "Blue Widget", 7.95),
        ];
    }

    public function testBasketExamples() {
        $delivery = new DeliveryRules();
        $offer = new BuyOneHalfPriceOffer("R01");

        $basket = new Basket($this->catalogue, $delivery, [$offer]);
        $basket->add("B01");
        $basket->add("G01");
        $this->assertEquals(37.85, $basket->total());

        $basket = new Basket($this->catalogue, $delivery, [$offer]);
        $basket->add("R01");
        $basket->add("R01");
        $this->assertEquals(54.38, $basket->total());

        $basket = new Basket($this->catalogue, $delivery, [$offer]);
        $basket->add("R01");
        $basket->add("G01");
        $this->assertEquals(60.85, $basket->total());

        $basket = new Basket($this->catalogue, $delivery, [$offer]);
        $basket->add("B01");
        $basket->add("B01");
        $basket->add("R01");
        $basket->add("R01");
        $basket->add("R01");
        $this->assertEquals(98.28, $basket->total());
    }
}
