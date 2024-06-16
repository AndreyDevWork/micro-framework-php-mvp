<?php

namespace Core\Patterns\State;

abstract class State
{

    /**
     * Контекст передаёт себя в конструктор состояния, чтобы состояние могло
     * обращаться к его данным и методам в будущем, если потребуется.
     */
    public function __construct(public Player $player)
    {
    }
    abstract public function onLock(Player $player): string;
    abstract public function onPlay(): string;
    abstract public function onNext(): string;
    abstract public function onPrevious(): string;
}