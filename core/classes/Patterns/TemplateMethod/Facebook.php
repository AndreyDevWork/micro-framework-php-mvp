<?php

namespace Core\Patterns\TemplateMethod;

class Facebook extends SocialNetwork
{
    public function logIn(string $userName, string $password): bool
    {
        echo "\nChecking user's credentials...\n";
        echo 'Name: ' . $this->username . "\n";
        echo 'Password: ' . str_repeat('*', strlen($this->password)) . "\n";

        simulateNetworkLatency();

        echo "\n\nFacebook: '" . $this->username . "' has logged in successfully.\n";

        return true;
    }

    public function sendData(string $message): bool
    {
        echo "Facebook: '" . $this->username . "' has posted '" . $message . "'.\n";

        return true;
    }

    public function logOut(): void
    {
        echo "Facebook: '" . $this->username . "' has been logged out.\n";
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