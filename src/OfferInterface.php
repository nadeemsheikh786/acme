<?php
namespace Acme;

interface OfferInterface {
    public function apply(array $items): float;
}
