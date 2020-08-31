<?php

namespace App\Entity;

use App\Entity\FlyCondition\FlyTimeCondition;
use App\Entity\FlyCondition\WeatherCondition;

class AeropraktA24 extends AbstractAirplane implements CanTakeOffOnRunwayInterface, CanLandOnRunwayInterface, CanTakeOffOnWaterInterface, CanLandOnWaterInterface
{
    public function takeOffOnRunway()
    {
        echo "Taking off on runway...\n";
    }

    public function landOnRunway()
    {
        echo "Landing on runway...\n";
    }

    public function takeOffOnWater()
    {
        echo "Taking off on water...\n";
    }

    public function landOnWater()
    {
        echo "Landing on water...\n";
    }

    public function canFly(FlyTimeCondition $flyTimeCondition, WeatherCondition $weatherCondition): bool
    {
        return $flyTimeCondition->isDaytime() && $weatherCondition->isGoodWeather();
    }
}