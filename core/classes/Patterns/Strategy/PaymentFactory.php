<?php

namespace Core\Patterns\Builder;

/**
 * Этот класс помогает создать правильный объект стратегии для обработки
 * платежа.
 */
class PaymentFactory
{
    /**
     * Получаем способ оплаты по его ID.
     *
     * @param $id
     * @return PaymentMethod
     * @throws \Exception
     */
    public static function getPaymentMethod(string $id): PaymentMethod
    {
        switch ($id) {
            case "cc":
                return new CreditCardPayment();
            case "paypal":
                return new PayPalPayment();
            default:
                throw new \Exception("Unknown Payment Method");
        }
    }
}