<?php

declare(strict_types=1);

namespace App\Validator;

use App\DTO\TrafficDTO;

class CountValidator
{
    /**
     * @param TrafficDTO $countDTO
     * @return array
     */
    public function validate(TrafficDTO $countDTO): array
    {
        $errors = [];

        if (!filter_var($countDTO->ip, FILTER_VALIDATE_IP)) {
            $errors[] = sprintf('%s is not a valid IP address', $countDTO->ip);
        }

        if (empty($countDTO->pageUrl)) {
            $errors[] = 'Page url can not be empty';
        }

        if (empty($countDTO->userAgent)) {
            $errors[] = 'User agent can not be empty';
        }

        return $errors;
    }
}