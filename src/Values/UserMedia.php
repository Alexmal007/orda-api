<?php

namespace Alexmal\OrdaApi\Values;

final readonly class UserMedia
{
    public function __construct(
        public int $media_id,
        public ?string $text_data = null,
        public ?string $description = null,
        public ?string $external_id = null
    )
    {}
}