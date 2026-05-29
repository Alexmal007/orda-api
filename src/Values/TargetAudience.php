<?php

namespace Alexmal\OrdaApi\Values;

final readonly class TargetAudience
{
    /**
     * @param string[] $geo Налоговые коды регионов ("77", "97")
     * @param string[] $sex Пол: male, female
     * @param string[] $age Диапазон возраста ("18:25", "30:45")
     */
    public function __construct(
        public ?array $geo,
        public ?array $sex = null,
        public ?array $age = null
    )
    {
    }
}