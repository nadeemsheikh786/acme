<?php
require __DIR__ . '/../vendor/autoload.php';

use Acme\Product;
use Acme\Basket;
use Acme\DeliveryRules;
use Acme\BuyOneHalfPriceOffer;

$catalogue = [
    "R01" => new Product("R01", "Red Widget", 32.95),
    "G01" => new Product("G01", "Green Widget", 24.95),
    "B01" => new Product("B01", "Blue Widget", 7.95),
];

$delivery = new DeliveryRules();
$offer = new BuyOneHalfPriceOffer("R01");

$basket = new Basket($catalogue, $delivery, [$offer]);
$basket->add("R01");
$basket->add("R01");
$basket->add("R01");
$basket->add("B01");
$basket->add("B01");
echo "Total: $" . $basket->total() . PHP_EOL;
