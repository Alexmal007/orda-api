<?php

namespace Alexmal\OrdaApi\Transport;

use Alexmal\OrdaApi\Enums\HttpMethod;

class CurlTransport implements TransportInterface
{
    public function call(string $url, HttpMethod $method, array $payload = [], ?string $token = null, array $files = []): TransportResponse
    {
        $curl = curl_init($url);

        $isMultipart = $files !== [];

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method->value,
            CURLOPT_HTTPHEADER => $this->makeHeadersArray($token, $isMultipart),
        ];

        if ($isMultipart) {
            foreach ($files as $name => $file) {
                foreach ($file as $index => $path) {
                    $payload["{$name}[$index]"] = curl_file_create($path);
                }
            }
        }

        if ($payload !== []) {
            $options[CURLOPT_POSTFIELDS] = $isMultipart ? $payload : json_encode($payload);
        }

        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $response_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);

        return new TransportResponse($response_code, $response);
    }

    private function makeHeadersArray(?string $token, bool $isMultipart): array
    {
        $headers = ['Accept: application/json'];

        if (!$isMultipart) {
            $headers[] = 'Content-Type: application/json';
        }

        if ($token !== null) {
            $headers[] = 'Authorization: Bearer ' . $token;
        }

        return $headers;
    }
}
