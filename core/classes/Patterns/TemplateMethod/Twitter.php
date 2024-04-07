<?php

namespace Core\Patterns\TemplateMethod;

class Twitter extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        echo "\nChecking user's credentials...\n";
        echo 'Name: ' . $this->username . "\n";
        echo 'Password: ' . str_repeat('*', strlen($this->password)) . "\n";

        simulateNetworkLatency();

        echo "\n\nTwitter: '" . $this->username . "' has logged in successfully.\n";

        return true;
    }

    public function sendData(string $message): bool
    {
        echo "Twitter: '" . $this->username . "' has posted '" . $message . "'.\n";

        return true;
    }

    public function logOut(): void
    {
        echo "Twitter: '" . $this->username . "' has been logged out.\n";
    }
}

function simulateNetworkLatency()
{
    $i = 0;
    while ($i < 5) {
        echo '.';
        sleep(1);
        $i++;
    }
}