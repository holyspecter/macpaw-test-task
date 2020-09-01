<?php

namespace spec\App\Entity;

use App\Entity\AeropraktA24;
use App\Entity\CanTakeOffOnRunwayInterface;
use App\Entity\CanLandOnRunwayInterface;
use App\Entity\CanTakeOffOnWaterInterface;
use App\Entity\CanLandOnWaterInterface;
use PhpSpec\ObjectBehavior;
use App\Entity\FlyCondition\FlyTimeCondition;
use App\Entity\FlyCondition\WeatherCondition;

class AeropraktA24Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AeropraktA24::class);
        $this->shouldHaveType(CanTakeOffOnRunwayInterface::class);
        $this->shouldHaveType(CanLandOnRunwayInterface::class);
        $this->shouldHaveType(CanTakeOffOnWaterInterface::class);
        $this->shouldHaveType(CanLandOnWaterInterface::class);
    }

    function it_can_fly_in_daytime_in_good_weather(
        FlyTimeCondition $flyTimeCondition,
        WeatherCondition $weatherCondition
    ) {
        $flyTimeCondition->isDaytime()->willReturn(true);
        $weatherCondition->isGoodWeather()->willReturn(true);

        $this->canFly($flyTimeCondition, $weatherCondition)->shouldReturn(true);
    }

    function it_can_not_fly_in_nighttime_in_good_weather(
        FlyTimeCondition $flyTimeCondition,
        WeatherCondition $weatherCondition
    ) {
        $flyTimeCondition->isDaytime()->willReturn(false);
        $weatherCondition->isGoodWeather()->willReturn(true);

        $this->canFly($flyTimeCondition, $weatherCondition)->shouldReturn(false);
    }

    function it_can_not_fly_in_daytime_in_bad_weather(
        FlyTimeCondition $flyTimeCondition,
        WeatherCondition $weatherCondition
    ) {
        $flyTimeCondition->isDaytime()->willReturn(true);
        $weatherCondition->isGoodWeather()->willReturn(false);

        $this->canFly($flyTimeCondition, $weatherCondition)->shouldReturn(false);
    }

    function it_can_not_fly_in_nighttime_in_bad_weather(
        FlyTimeCondition $flyTimeCondition,
        WeatherCondition $weatherCondition
    ) {
        $flyTimeCondition->isDaytime()->willReturn(false);
        $weatherCondition->isGoodWeather()->willReturn(false);

        $this->canFly($flyTimeCondition, $weatherCondition)->shouldReturn(false);
    }
}
