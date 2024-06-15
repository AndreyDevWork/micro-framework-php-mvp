<?php
/**
 * Клиентский код не зависит от классов подсистем. Любые изменения внутри кода
 * подсистем не будут влиять на клиентский код. Вам нужно будет всего лишь
 * обновить Фасад.
 */
function clientCode(\Core\Patterns\Facade\YouTubeDownloaderFacade $facade)
{
// ...

    $facade->downloadVideo("https://www.youtube.com/watch?v=QH2-TGUlwu4");

// ...
}

$facade = new \Core\Patterns\Facade\YouTubeDownloaderFacade("APIKEY-XXXXXXXXX");
clientCode($facade);