<?php

namespace App\Controller;

use App\Repository\HangarRepository;

class AirplaneController
{
    private $hangarRepository;

    public function __construct(HangarRepository $hangarRepository)
    {
        $this->hangarRepository = $hangarRepository;
    }

    public function listByHangar(string $hangarName)
    {
        $hangar = $this->hangarRepository->findOneByName($hangarName);

        return $hangar->getAirplanes();
    }
}