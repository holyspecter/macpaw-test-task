<?php

namespace spec\App\Controller;

use App\Controller\AirplaneController;
use PhpSpec\ObjectBehavior;
use App\Repository\HangarRepository;
use App\Entity\Hangar;
use App\Entity\Boeing747;

class AirplaneControllerSpec extends ObjectBehavior
{
    function let(HangarRepository $hangarRepository)
    {
        $this->beConstructedWith($hangarRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AirplaneController::class);
    }

    function it_lists_airports_by_hangar(
        HangarRepository $hangarRepository,
        Hangar $hangar
    ) {
        $airplanes = [new Boeing747()];
        $hangar->getAirplanes()->willReturn($airplanes);
        $hangarName = 'hangarX';
        $hangarRepository->findOneByName($hangarName)->willReturn($hangar);
        $this->listByHangar($hangarName)->shouldReturn($airplanes);
    }
}
