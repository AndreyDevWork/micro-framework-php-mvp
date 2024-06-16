<?php

namespace Core\Patterns\Visitor;

class Company implements Entity
{
    private $name;

    /**
     * @var Department[]
     */
    private $departments;

    public function __construct(string $name, array $departments)
    {
        $this->name = $name;
        $this->departments = $departments;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDepartments(): array
    {
        return $this->departments;
    }

    // ...

    public function accept(Visitor $visitor): string
    {
        // Смотрите, Компонент Компании должен вызвать метод visitCompany. Тот
        // же принцип применяется ко всем компонентам.
        return $visitor->visitCompany($this);
    }
}