<?php

namespace App\Repository;

use App\Entity\Hangar;

class HangarRepository
{
    public function findOneByName(string $name): Hangar
    {
        return new Hangar();
    }
}