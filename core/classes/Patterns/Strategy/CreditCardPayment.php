<?php

namespace Core\Patterns\Builder;

use Core\Patterns\Builder\PaymentMethod;

/**
 * Эта Конкретная Стратегия предоставляет форму оплаты и проверяет результаты
 * платежей кредитными картам.
 */
class CreditCardPayment implements PaymentMethod
{
    static private $store_secret_key = "swordfish";

    public function getPaymentForm(OrderController $order): string
    {
        $returnURL = "https://our-website.com/" .
            "order/{$order->id}/payment/cc/return";

        return <<<FORM
<form action="https://my-credit-card-processor.com/charge" method="POST">
    <input type="hidden" id="email" value="{$order->email}">
    <input type="hidden" id="total" value="{$order->total}">
    <input type="hidden" id="returnURL" value="$returnURL">
    <input type="text" id="cardholder-name">
    <input type="text" id="credit-card">
    <input type="text" id="expiration-date">
    <input type="text" id="ccv-number">
    <input type="submit" value="Pay">
</form>
FORM;
    }

    public function validateReturn(OrderController $order, array $data): bool
    {
        echo "CreditCardPayment: ...validating... ";

        if ($data['key'] != md5($order->id . static::$store_secret_key)) {
            throw new \Exception("Payment key is wrong.");
        }

        if (!isset($data['success']) || !$data['success'] || $data['success'] == 'false') {
            throw new \Exception("Payment failed.");
        }

        // ...

        if (floatval($data['total']) < $order->total) {
            throw new \Exception("Payment amount is wrong.");
        }

        echo "Done!\n";

        return true;
    }
}