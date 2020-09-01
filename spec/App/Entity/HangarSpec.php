<?php

namespace spec\App\Entity;

use App\Entity\Hangar;
use App\Entity\AeropraktA24;
use App\Entity\CurtissNC24;
use App\Entity\Boeing747;
use PhpSpec\ObjectBehavior;

class HangarSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Hangar::class);
    }

    function it_returns_list_of_airplanes()
    {
        $this->getAirplanes()->shouldHaveCount(10);
    }
}
