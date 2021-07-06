<?php

declare(strict_types=1);

namespace App\Handler;

use App\DTO\TrafficDTO;
use App\Repository\TrafficRepository;
use App\Service\Creator\TrafficCreator;
use App\Validator\CountValidator;
use App\Entity\Traffic;

class TrafficHandler
{
    /**
     * @var CountValidator
     */
    private CountValidator $countValidator;

    /**
     * @var TrafficRepository
     */
    private TrafficRepository $countRepository;

    /**
     * @var TrafficCreator
     */
    private TrafficCreator $counterCreator;

    public function __construct()
    {
        $this->countValidator = new CountValidator();
        $this->countRepository = new TrafficRepository();
        $this->counterCreator = new TrafficCreator();
    }

    /**
     * @param TrafficDTO $countDTO
     *
     * @throws \Exception
     */
    public function handle(TrafficDTO $countDTO): void
    {
        $errors = $this->countValidator->validate($countDTO);

        if (count($errors) !== 0) {
            return;
        }

        $traffic = $this->countRepository->findTrafficByParams($countDTO);

        if ($traffic === null) {
            $traffic = $this->counterCreator->create($countDTO);
            $this->countRepository->insert($traffic);
        } else {
            $traffic->increaseViewCount();
            $this->countRepository->update($traffic);
        }
    }
}