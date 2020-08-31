<?php

namespace App\Entity;

use App\Entity\FlyCondition\FlyTimeCondition;
use App\Entity\FlyCondition\WeatherCondition;

abstract class AbstractAirplane implements \JsonSerializable
{
    public function takeOff()
    {
        echo "Taking off...\n";
    }

    public function fly()
    {
        echo "Flying...\n";
    }

    public function land()
    {
        echo "Landing...\n";
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => get_class($this),
            'id' => spl_object_hash($this),
        ];
    }

    abstract public function canFly(FlyTimeCondition $flyTimeCondition, WeatherCondition $weatherCondition): bool;
}