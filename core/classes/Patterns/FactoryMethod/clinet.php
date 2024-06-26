<?php

use Core\Patterns\FactoryMethod\FacebookPoster;
use Core\Patterns\FactoryMethod\LinkedInPoster;
use Core\Patterns\FactoryMethod\SocialNetworkPoster;

/**
 * Клиентский код может работать с любым подклассом SocialNetworkPoster, так как
 * он не зависит от конкретных классов.
 */
function clientCode(SocialNetworkPoster $creator)
{
    // ...
    $creator->post('Hello world!');
    $creator->post('I had a large hamburger this morning!');
    // ...
}

/**
 * На этапе инициализации приложение может выбрать, с какой социальной сетью оно
 * хочет работать, создать объект соответствующего подкласса и передать его
 * клиентскому коду.
 */
echo "Testing ConcreteCreator1:\n";
clientCode(new FacebookPoster('john_smith', '******'));
echo "\n\n";

echo "Testing ConcreteCreator2:\n";
clientCode(new LinkedInPoster('john_smith@example.com', '******'));
