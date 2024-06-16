<?php

namespace Core\Patterns\State;

use Core\Patterns\State\State;

class PlayingState extends State
{


    /**
     * Конкретные состояния реализуют методы абстрактного состояния по-своему.
     */
    public function onLock(Player $player): string
    {
        $this->player->changeState(new LockedState($this->player));
        $this->player->setCurrentTrackAfterStop();
        return "Stop playing";
    }

    public function onPlay(): string
    {
        $this->player->changeState(new ReadyState($this->player));
        return "Paused...";
    }

    public function onNext(): string
    {
        return $this->player->nextTrack();
    }

    public function onPrevious(): string
    {
        return $this->previousTrack();
    }
}