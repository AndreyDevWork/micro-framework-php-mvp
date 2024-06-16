<?php

namespace Core\Patterns\State;

use Core\Patterns\State\State;

class LockedState extends State
{


    /**
     * Конкретные состояния реализуют методы абстрактного состояния по-своему.
     */
    public function onLock(Player $player): string
    {
        $player->setPlaying(false);
        return 'dasd';
    }

    public function onPlay(): string
    {
        if ($this->player->isPlaying()) {
            $this->player->changeState(new ReadyState($this->player));
            return "Stop playing";
        } else {
            return "Locked...";
        }
    }

    public function onNext(): string
    {
        $this->player->changeState(new ReadyState($this->player));
        return "Ready";
    }

    public function onPrevious(): string
    {
        return "Locked...";
    }
}