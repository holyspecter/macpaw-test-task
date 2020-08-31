<?php

namespace App\Entity;

use App\Entity\FlyCondition\FlyTimeCondition;
use App\Entity\FlyCondition\WeatherCondition;

class Boeing747 extends AbstractAirplane implements CanTakeOffOnRunwayInterface, CanLandOnRunwayInterface
{
    public function takeOffOnRunway()
    {
        echo "Taking off on runway...\n";
    }

    public function landOnRunway()
    {
        echo "Landing on runway...\n";
    }

    public function canFly(FlyTimeCondition $flyTimeCondition, WeatherCondition $weatherCondition): bool
    {
        return true;
    }
}