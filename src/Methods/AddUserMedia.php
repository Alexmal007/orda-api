<?php

namespace Alexmal\OrdaApi\Methods;

use Alexmal\OrdaApi\Enums\HttpMethod;

final class AddUserMedia implements MethodInterface
{
    /**
     * @param string[] $media Абсолютные или относительные пути к файлам
     */
    public function __construct(
        private array $media,
    )
    {
    }

    public function getHttpMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function getEndpoint(): string
    {
        return 'user/media/';
    }

    public function getPayload(): array
    {
        return [];
    }

    public function getFiles(): array
    {
        return [
            'media' => $this->media
        ];
    }
}
