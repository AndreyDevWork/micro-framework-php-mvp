<?php

namespace Core\Patterns\State;


class Player {
    private $state;
    private $playing = false;
    private $playlist = [];
    private $currentTrack = 0;

    public function __construct() {
        $this->state = new ReadyState($this);
        $this->setPlaying(true);
        for ($i = 1; $i <= 12; $i++) {
            $this->playlist[] = "Track " . $i;
        }
    }

    public function changeState($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }

    public function setPlaying($playing) {
        $this->playing = $playing;
    }

    public function isPlaying() {
        return $this->playing;
    }

    public function startPlayback() {
        return "Playing " . $this->playlist[$this->currentTrack];
    }

    public function nextTrack() {
        $this->currentTrack++;
        if ($this->currentTrack > count($this->playlist) - 1) {
            $this->currentTrack = 0;
        }
        return "Playing " . $this->playlist[$this->currentTrack];
    }

    public function previousTrack() {
        $this->currentTrack--;
        if ($this->currentTrack < 0) {
            $this->currentTrack = count($this->playlist) - 1;
        }
        return "Playing " . $this->playlist[$this->currentTrack];
    }

    public function setCurrentTrackAfterStop() {
        $this->currentTrack = 0;
    }
}

class State {
    protected $player;

    public function __construct($player) {
        $this->player = $player;
    }
}

class ReadyState extends State {
    // Implement specific behavior for the ready state if needed
}
