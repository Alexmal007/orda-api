<?php

namespace Alexmal\OrdaApi\Methods;

use Alexmal\OrdaApi\Enums\HttpMethod;

class GetOrganizations implements MethodInterface
{
    public function getHttpMethod(): HttpMethod
    {
        return HttpMethod::GET;
    }

    public function getEndpoint(): string
    {
        return 'organizations';
    }

    public function getPayload(): array
    {
        return [];
    }

    public function getFiles(): array
    {
        return [];
    }
}
