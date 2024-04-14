<?php

namespace Core\Patterns\FactoryMethod;

interface SocialNetworkConnector
{
    public function logIn(): void;

    public function logOut(): void;

    public function createPost($content): void;
}