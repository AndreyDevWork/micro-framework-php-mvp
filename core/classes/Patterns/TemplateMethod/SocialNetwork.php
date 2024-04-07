<?php

namespace Core\Patterns\TemplateMethod;

abstract class SocialNetwork
{
    protected $username;

    protected $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Фактический метод шаблона вызывает абстрактные шаги в определённом
     * порядке. Подкласс может реализовать все шаги, позволяя этому методу
     * реально публиковать что-то в социальной сети.
     */
    public function post(string $message): bool
    {
        // Проверка подлинности перед публикацией. Каждая сеть использует свой
        // метод авторизации.
        $this->hook1();
        if ($this->logIn($this->username, $this->password)) {
            // Отправляем почтовые данные. Все сети имеют разные API.
            $result = $this->sendData($message);
            // ...
            $this->logOut();
            $this->hook2();
            return $result;
        }

        return false;
    }

    /**
     * Это «хуки». Подклассы могут переопределять их, но это не обязательно,
     * поскольку у хуков уже есть стандартная (но пустая) реализация. Хуки
     * предоставляют дополнительные точки расширения в некоторых критических
     * местах алгоритма.
     */
    protected function hook1(): void
    {
    }

    /**
     * Шаги объявлены абстрактными, чтобы заставить подклассы реализовать их
     * полностью.
     */
    abstract public function logIn(string $userName, string $password): bool;

    abstract public function sendData(string $message): bool;

    abstract public function logOut(): void;

    protected function hook2(): void
    {
    }
}