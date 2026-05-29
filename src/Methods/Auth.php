<?php

namespace Alexmal\OrdaApi\Methods;

use Alexmal\OrdaApi\Enums\HttpMethod;
use SensitiveParameter;

final class Auth implements MethodInterface
{
    private string $email;
    private string $password;

    public function __construct(
        string $email,
        #[SensitiveParameter] string $password
    )
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getHttpMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function getEndpoint(): string
    {
        return 'auth';
    }

    public function getPayload(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function getFiles(): array
    {
        return [];
    }
}
