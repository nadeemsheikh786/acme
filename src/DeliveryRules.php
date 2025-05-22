<?php
namespace Acme;

class DeliveryRules {
    public function getDeliveryCharge(float $subtotal): float {
        if ($subtotal < 50.0) return 4.95;
        if ($subtotal < 90.0) return 2.95;
        return 0.0;
    }
}
