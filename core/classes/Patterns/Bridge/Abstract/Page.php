<?php

namespace Core\Patterns\Bridge\Abstract;

use Core\Patterns\Bridge\Renderer;

/**
 * Абстракция.
 */
abstract class Page
{
    /**
     * @var Renderer
     */
    protected $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function changeRenderer(Renderer $renderer): void
    {
        $this->renderer = $renderer;
    }

    abstract public function view(): string;
}