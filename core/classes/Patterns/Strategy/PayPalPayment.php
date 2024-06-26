<?php

namespace Core\Patterns\Builder;

use Core\Patterns\Builder\PaymentMethod;

/**
 * Эта Конкретная Стратегия предоставляет форму оплаты и проверяет результаты
 * платежей PayPal.
 */
class PayPalPayment implements PaymentMethod
{
    public function getPaymentForm(OrderController $order): string
    {
        $returnURL = "https://our-website.com/" .
            "order/{$order->id}/payment/paypal/return";

        return <<<FORM
<form action="https://paypal.com/payment" method="POST">
    <input type="hidden" id="email" value="{$order->email}">
    <input type="hidden" id="total" value="{$order->total}">
    <input type="hidden" id="returnURL" value="$returnURL">
    <input type="submit" value="Pay on PayPal">
</form>
FORM;
    }

    public function validateReturn(OrderController $order, array $data): bool
    {
        echo "PayPalPayment: ...validating... ";

        // ...

        echo "Done!\n";

        return true;
    }
}
