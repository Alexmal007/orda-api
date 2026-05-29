<?php

namespace Alexmal\OrdaApi;

use Alexmal\OrdaApi\Enums\HttpMethod;
use Alexmal\OrdaApi\Methods\MethodInterface;
use Alexmal\OrdaApi\Transport\TransportInterface;
use Alexmal\OrdaApi\Transport\TransportResponse;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;


final class ApiV2
{
    private string $baseUrl;
    private LoggerInterface $logger;

    private TransportInterface $transport;

    public function __construct(
        string $baseUrl,
        ?LoggerInterface $logger,
        TransportInterface $transport
    )
    {
        $this->baseUrl = $baseUrl;
        $this->logger = $logger;
        $this->transport = $transport;
    }

    public function call(MethodInterface $method, ?string $token): TransportResponse
    {
        $url = $this->baseUrl . "/" . $method->getEndpoint();
        $payload = $method->getPayload();
        $files = $method->getFiles();

        if ($method->getHttpMethod() === HttpMethod::GET && $payload !== []) {
            $url .= '?' . http_build_query($payload);
        }

        $this->logger?->info("[{$method->getHttpMethod()->value}]\t$url\n" . print_r($payload, true));
        $response = $this->transport->call(
            $url,
            $method->getHttpMethod(),
            $payload,
            $token,
            $files
        );

        $this->logger?->info("[Response " . $response->statusCode . "]\n" . print_r($response->body, true));
        return $response;
    }
}
