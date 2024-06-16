<?php

namespace Core\Patterns\State;

use Core\Patterns\State\State;

class ReadyState extends State
{


    /**
     * Они также могут переводить контекст в другие состояния.
     */
    public function onLock(Player $player): string
    {
        $this->player->setAnime(false);
        return '2222';
    }

    public function onPlay(): string
    {
        $this->player->changeState(new LockedState($this->player));
        return "Locked...";
    }

    public function onNext(): string
    {
        $action = $this->player->startPlayback();
        $this->player->changeState(new PlayingState($this->player));
        return $action;
    }

    public function onPrevious(): string
    {
        return "UnLocked...";
    }
}