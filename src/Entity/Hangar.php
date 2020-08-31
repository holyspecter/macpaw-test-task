<?php

namespace App\Entity;

class Hangar
{
    public function getAirplanes(): array
    {
        return [
            new AeropraktA24(),
            new AeropraktA24(),
            new AeropraktA24(),
            new AeropraktA24(),
            new AeropraktA24(),

            new CurtissNC24(),
            new CurtissNC24(),
            new CurtissNC24(),

            new Boeing747(),
            new Boeing747(),
        ];
    }
}