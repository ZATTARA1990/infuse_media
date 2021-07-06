<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\TrafficDTO;
use App\Handler\TrafficHandler;

class TrafficAnalyzer
{
    /**
     * @var TrafficHandler
     */
    private TrafficHandler $trafficHandler;

    public function __construct()
    {
        $this->trafficHandler = new TrafficHandler();
    }

    /**
     * @throws \Exception
     */
    public function analyze(): void
    {
        $trafficDTO = new TrafficDTO();

        $trafficDTO->ip = $_SERVER['REMOTE_ADDR'] ?? '';
        $trafficDTO->userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $trafficDTO->pageUrl = $_SERVER['HTTP_REFERER'] ?? '';

        $this->trafficHandler->handle($trafficDTO);
    }
}