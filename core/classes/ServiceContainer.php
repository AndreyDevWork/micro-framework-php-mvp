<?php

namespace Core;

use Exception;

class ServiceContainer
{
    protected array $services = [];

    /**
     * @param array $services
     */
    public function setService($service, $func): void
    {
        $this->services[$service] = $func;
    }

    /**
     * @return array
     */
    public function getService($service)
    {
        if (!isset($this->services[$service])) {
            throw new Exception("Not found service {$service}");
        }
        return call_user_func($this->services[$service]);
    }
}
