<?php

namespace Core\Patterns\Visitor;

/**
 * Интерфейс Компонента объявляет метод принятия объектов-посетителей.
 *
 * В этом методе Конкретный Компонент вызывает конкретный метод Посетителя, с
 * тем же типом параметра, что и у компонента.
 */
interface Entity
{
    public function accept(Visitor $visitor): string;
}