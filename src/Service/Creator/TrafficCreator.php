<?php

declare(strict_types=1);

namespace App\Service\Creator;

use App\DTO\TrafficDTO;
use App\Entity\Traffic;

class TrafficCreator
{
    /**
     * @param TrafficDTO $countDTO
     * @return Traffic
     */
    public function create(TrafficDTO $countDTO): Traffic
    {
        return new Traffic($countDTO->ip, $countDTO->userAgent, $countDTO->pageUrl);
    }
}