<?php

use Core\Patterns\Proxy\CachingDownloader;
use Core\Patterns\Proxy\Downloader;
use Core\Patterns\Proxy\SimpleDownloader;

/**
 * Клиентский код может выдать несколько похожих запросов на загрузку. В этом
 * случае кэширующий заместитель экономит время и трафик, подавая результаты из
 * кэша.
 *
 * Клиент не знает, что он работает с заместителем, потому что он работает с
 * загрузчиками через абстрактный интерфейс.
 */
function clientCode(Downloader $subject)
{
    // ...

    $result = $subject->download("http://example.com/");

    // Повторяющиеся запросы на загрузку могут кэшироваться для увеличения
    // скорости.

    $result = $subject->download("http://example.com/");

    // ...
}

echo "Executing client code with real subject:\n";
$realSubject = new SimpleDownloader();
clientCode($realSubject);

echo "\n";

echo "Executing the same client code with a proxy:\n";
$proxy = new CachingDownloader($realSubject);
clientCode($proxy);