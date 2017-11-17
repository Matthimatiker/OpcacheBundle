<?php

declare(strict_types=1);

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

class InternedStrings
{
    /**
     * @var float
     */
    private $usageInMb;
    /**
     * @var float
     */
    private $sizeInMb;
    /**
     * @var float
     */
    private $freeInMb;
    /**
     * @var int
     */
    private $stringCount;

    public function __construct(
        float $usageInMb,
        float $sizeInMb,
        float $freeInMb,
        int $stringCount
    ) {
        $this->usageInMb = $usageInMb;
        $this->sizeInMb = $sizeInMb;
        $this->freeInMb = $freeInMb;
        $this->stringCount = $stringCount;
    }

    public function getUsageInMb(): float
    {
        return $this->usageInMb;
    }

    public function getSizeInMb(): float
    {
        return $this->sizeInMb;
    }

    public function getFreeInMb(): float
    {
        return $this->freeInMb;
    }

    public function getStringCount(): int
    {
        return $this->stringCount;
    }
}
