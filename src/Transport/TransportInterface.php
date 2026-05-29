<?php

namespace Alexmal\OrdaApi\Transport;

use Alexmal\OrdaApi\Enums\HttpMethod;

interface TransportInterface
{
    /**
     * @param array<string, array<string>> $files
     */
    public function call(string $url, HttpMethod $method, array $payload = [], ?string $token = null, array $files = []): TransportResponse;
}
