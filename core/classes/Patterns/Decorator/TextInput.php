<?php

namespace Core\Patterns\Decorator;

use Core\Patterns\Decorator\InputFormat;

/**
 * Конкретный Компонент является основным элементом декорирования. Он содержит
 * исходный текст как есть, без какой-либо фильтрации или форматирования.
 */
class TextInput implements InputFormat
{

    public function formatText(string $text): string
    {
        return $text;
    }
}