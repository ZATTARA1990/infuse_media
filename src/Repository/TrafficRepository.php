<?php

declare(strict_types=1);

namespace App\Repository;

use App\DTO\TrafficDTO;
use App\Entity\Traffic;
use App\Hydrator\TrafficHydrator;
use \PDO;

class TrafficRepository extends AbstractRepository
{
    /**
     * @var TrafficHydrator
     */
    private TrafficHydrator $hydrator;

    public function __construct()
    {
        parent::__construct();

        $this->hydrator = new TrafficHydrator();
    }

    /**
     * @param TrafficDTO $trafficDTO
     *
     * @return Traffic|null
     *
     * @throws \Exception
     */
    public function findTrafficByParams(TrafficDTO $trafficDTO): ?Traffic
    {
        $stmt = $this->PDO->prepare(
            'SELECT * FROM traffic WHERE ip = :ip AND user_agent = :user_agent AND page_url = :page_url'
        );
        $stmt->execute(
            ['ip' => $trafficDTO->ip, 'user_agent' => $trafficDTO->userAgent, 'page_url' => $trafficDTO->pageUrl]
        );

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return is_array($result) ? $this->hydrator->hydrate($result) : null;
    }

    /**
     * @param Traffic $traffic
     */
    public function update(Traffic $traffic): void
    {
        $stmt = $this->PDO->prepare(
            'UPDATE traffic SET view_date = :view_date, views_count = :views_count WHERE ip = :ip AND user_agent = :user_agent AND page_url = :page_url'
        );
        $stmt->execute(
            [
                'view_date' => $traffic->getViewDate()->format(DATE_ATOM),
                'views_count' => $traffic->getViewsCount(),
                'ip' => $traffic->getIp(),
                'user_agent' => $traffic->getUserAgent(),
                'page_url' => $traffic->getPageUrl()
            ]
        );
    }

    /**
     * @param Traffic $traffic
     */
    public function insert(Traffic $traffic): void
    {
        $stmt = $this->PDO->prepare(
            'INSERT INTO traffic (ip, user_agent, page_url, view_date, views_count)
                   VALUES (:ip, :user_agent, :page_url, :view_date, :views_count) '
        );
        $stmt->execute(
            [
                'ip' => $traffic->getIp(),
                'user_agent' => $traffic->getUserAgent(),
                'page_url' => $traffic->getPageUrl(),
                'view_date' => $traffic->getViewDate()->format(DATE_ATOM),
                'views_count' => $traffic->getViewsCount(),
            ]
        );
    }
}