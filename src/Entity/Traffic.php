<?php

declare(strict_types=1);

namespace App\Entity;

class Traffic
{
    /**
     * @var string
     */
    private string $ip;

    /**
     * @var string
     */
    private string $userAgent;

    /**
     * @var string
     */
    private string $pageUrl;

    /**
     * @var \DateTimeInterface
     */
    private \DateTimeInterface $viewDate;

    /**
     * @var int
     */
    private int $viewsCount;

    /**
     * @param string $ip
     * @param string $userAgent
     * @param string $pageUrl
     */
    public function __construct(string $ip, string $userAgent, string $pageUrl)
    {
        $this->ip = $ip;
        $this->userAgent = $userAgent;
        $this->pageUrl = $pageUrl;
        $this->viewDate = new \DateTimeImmutable();
        $this->viewsCount = 1;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent(string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return string
     */
    public function getPageUrl(): string
    {
        return $this->pageUrl;
    }

    /**
     * @param string $pageUrl
     */
    public function setPageUrl(string $pageUrl): void
    {
        $this->pageUrl = $pageUrl;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getViewDate()
    {
        return $this->viewDate;
    }

    /**
     * @param \DateTimeInterface $viewDate
     */
    public function setViewDate($viewDate): void
    {
        $this->viewDate = $viewDate;
    }

    /**
     * @return int
     */
    public function getViewsCount(): int
    {
        return $this->viewsCount;
    }

    /**
     * @param int $viewsCount
     */
    public function setViewsCount(int $viewsCount): void
    {
        $this->viewsCount = $viewsCount;
    }

    public function increaseViewCount(): void
    {
        $this->viewDate = new \DateTimeImmutable();
        ++$this->viewsCount;
    }

}