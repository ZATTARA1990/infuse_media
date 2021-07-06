<?php

declare(strict_types=1);

namespace App\Hydrator;

use App\Entity\Traffic;

class TrafficHydrator
{
    /**
     * @param array| $data
     *
     * @return Traffic|null
     *
     * @throws \Exception
     */
    public function hydrate(array $data): ?Traffic
    {
        if (empty($data)) {
            return null;
        }

        $traffic = new Traffic($data['ip'], $data['user_agent'], $data['page_url']);
        $traffic->setViewDate(new \DateTimeImmutable($data['view_date']));
        $traffic->setViewsCount($data['views_count']);

        return $traffic;
    }
}