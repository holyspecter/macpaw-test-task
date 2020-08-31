<?php

namespace App\Entity;

use App\Entity\FlyCondition\FlyTimeCondition;
use App\Entity\FlyCondition\WeatherCondition;

class CurtissNC24 extends AbstractAirplane implements CanTakeOffOnWaterInterface, CanLandOnWaterInterface
{
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