<?php

namespace Core\Patterns\Facade;

/**
 * Подсистема FFmpeg (сложная библиотека работы с видео/аудио).
 */
class FFMpeg
{
    public static function create(): FFMpeg { /* ... */ }

    public function open(string $video): void { /* ... */ }

    // ...more methods and classes... RU: ...дополнительные методы и классы...
}

class FFMpegVideo
{
    public function filters(): self { /* ... */ }

    public function resize(): self { /* ... */ }

    public function synchronize(): self { /* ... */ }

    public function frame(): self { /* ... */ }

    public function save(string $path): self { /* ... */ }

    // ...more methods and classes... RU: ...дополнительные методы и классы...
}