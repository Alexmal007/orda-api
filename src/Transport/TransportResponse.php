<?php

namespace Alexmal\OrdaApi\Transport;

readonly final class TransportResponse
{
    public function __construct(
        public int $statusCode,
        public string $body
    )
    {

    }

    public function bodyJson(): array
    {
        return json_decode($this->body, true);
    }
}