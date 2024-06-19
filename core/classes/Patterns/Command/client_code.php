<?php
/**
 * Клиентский код.
 */

use Core\Patterns\Command\IMDBGenresScrapingCommand;
use Core\Patterns\Command\Queue;

$queue = Queue::get();

if ($queue->isEmpty()) {
    $queue->add(new IMDBGenresScrapingCommand());
}

$queue->work();