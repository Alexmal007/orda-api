<?php

namespace Alexmal\OrdaApi\Methods;

use Alexmal\OrdaApi\Enums\HttpMethod;

interface MethodInterface
{
    public function getHttpMethod(): HttpMethod;

    public function getEndpoint(): string;

    public function getPayload(): array;

    /**
     * @return array<string, string[]>
     */
    public function getFiles(): array;
}
