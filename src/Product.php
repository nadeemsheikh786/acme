<?php
namespace Acme;

class Product {
    public $code;
    public $name;
    public $price;

    public function __construct(string $code, string $name, float $price) {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }
}
