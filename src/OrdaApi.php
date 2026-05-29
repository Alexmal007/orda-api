<?php

namespace Alexmal\OrdaApi;

use Alexmal\OrdaApi\Methods\MethodInterface;
use Alexmal\OrdaApi\Transport\TransportInterface;
use Alexmal\OrdaApi\Transport\TransportResponse;
use Psr\Log\LoggerInterface;

final class OrdaApi
{
    private ApiV2 $api;
    private ?string $token;

    public function __construct(string $endpoint = "https://api.ord-a.ru/api/v2", LoggerInterface $logger = null, ?TransportInterface $transport = null, string $token = null)
    {
        if ($transport === null) {
            $transport = new Transport\CurlTransport();
        }
        $this->api = new ApiV2($endpoint, $logger, $transport);
        $this->token = $token;
    }

    public function request(MethodInterface $method): TransportResponse
    {
        return $this->api->call($method, $this->token);
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}
