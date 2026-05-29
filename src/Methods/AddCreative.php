<?php

namespace Alexmal\OrdaApi\Methods;

use Alexmal\OrdaApi\Enums\CreativeTypeEnum;
use Alexmal\OrdaApi\Enums\TypeEnum;
use Alexmal\OrdaApi\Enums\HttpMethod;
use Alexmal\OrdaApi\Values\UserMedia;
use Alexmal\OrdaApi\Values\TargetAudience;

final class AddCreative implements MethodInterface
{
    /**
     * @param string $description
     * @param string|null $campaignName
     * @param TypeEnum $type
     * @param string[]|string|null $url
     * @param bool|null $isSocial
     * @param array|int|null $contract_id
     * @param int|null $baseContractId
     * @param bool $coBranding
     * @param int|null $selfPromotionOrganizationId
     * @param string|null $externalId
     * @param string[]|string|null $kktu
     * @param TargetAudience|null $targetAudience
     * @param CreativeTypeEnum|null $creativeType
     * @param int|null $feedId
     * @param UserMedia[] $creativeItems
     *
     * @see https://api.ord-a.ru/api/v2/documentation#/Creatives/a843585458cde4759a37a53b41316e02
     */
    public function __construct(
        private string $description,
        private ?string $campaignName,
        private TypeEnum $type,
        private array|string|null $url,
        private ?bool $isSocial,
        private array|int|null $contract_id,
        private ?int $baseContractId,
        private bool $coBranding,
        private ?int $selfPromotionOrganizationId,
        private ?string $externalId,
        private array|string|null $kktu,
        private ?TargetAudience $targetAudience,
        private ?CreativeTypeEnum $creativeType,
        private ?int $feedId,
        private array $creativeItems,
    )
    {

    }

    public function getHttpMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function getEndpoint(): string
    {
        return 'creatives';
    }

    public function getPayload(): array
    {
        return array_filter([
            'description' => $this->description,
            'campaign_name' => $this->campaignName,
            'type' => $this->type->value,
            'url' => $this->normalizeStringList($this->url),
            'is_social' => $this->isSocial,
            'contract_id' => $this->contract_id,
            'base_contract_id' => $this->baseContractId,
            'co_branding' => $this->coBranding,
            'self_promotion_organization_id' => $this->selfPromotionOrganizationId,
            'external_id' => $this->externalId,
            'kktu' => $this->normalizeStringList($this->kktu),
            'target_audience_list' => $this->targetAudience === null ? null : [
                'geo' => $this->targetAudience->geo,
                'sex' => $this->targetAudience->sex,
                'age' => $this->targetAudience->age,
            ],
            'creative_type' => $this->creativeType?->value,
            'feed_id' => $this->feedId,
            'creative_items' => array_map(
                static fn (UserMedia $item): array => [
                    'media_id' => $item->media_id,
                    'text_data' => $item->text_data,
                    'description' => $item->description,
                    'external_id' => $item->external_id,
                ],
                $this->creativeItems
            ),
        ], static fn (mixed $value): bool => $value !== null);
    }

    private function normalizeStringList(array|string|null $value): ?array
    {
        if ($value === null) {
            return null;
        }

        return is_array($value) ? $value : [$value];
    }

    public function getFiles(): array
    {
        return [];
    }
}
