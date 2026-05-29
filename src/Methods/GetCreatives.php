<?php

namespace Alexmal\OrdaApi\Methods;

use Alexmal\OrdaApi\Enums\HttpMethod;

final class GetCreatives implements MethodInterface
{
    /**
     * @param int|null $filterId
     * @param int|null $filterIdExact Точный фильтр по ID
     * @param int|null $filterIdNumber
     * @param string|null $filterErid
     * @param string|null $filterSearch Фильтр по ID или erid
     * @param string|null $filterType
     * @param string|null $filterContractType contract|intermediary-contract|additional-agreement
     * @param string|null $filterCampaign cpa|cpc|cpm|other
     * @param string|null $filterContract
     * @param int|null $filterContractId
     * @param int|null $filterContractIdExact Точный фильтр по договорам
     * @param string|null $filterCreatedAt
     * @param string|null $filterCampaignName
     * @param string|null $filterUrl
     * @param string|null $filterStatus 1|6|7|8|2|3|4|10
     * @param string|null $filterLastStatus 1|2|3|4|6|7|8|10
     * @param string|null $filterExternalId
     * @param string|null $filterStatistics with|without
     * @param bool|null $filterIsSocial
     * @param bool|null $filterCoBranding
     * @param bool|null $filterSelfPromotionOrganization
     * @param bool|null $filterIsNative
     * @param bool|null $filterIsSocialQuota
     * @param int|null $page
     * @param int|null $limit
     * @param string|null $filterTrashed with|only
     * @param string|null $filterAccess with|only
     * @param string|null $sort id|-id|name|-name|type|-type|campaign
     * @param string|null $include erirEntity|statisticsExists|creativeItemsExists|status_explanations
     */
    public function __construct(
        private ?int $filterId = null,
        private ?int $filterIdExact = null,
        private ?int $filterIdNumber = null,
        private ?string $filterErid = null,
        private ?string $filterSearch = null,
        private ?string $filterType = null,
        private ?string $filterContractType = null,
        private ?string $filterCampaign = null,
        private ?string $filterContract = null,
        private ?int $filterContractId = null,
        private ?int $filterContractIdExact = null,
        private ?string $filterCreatedAt = null,
        private ?string $filterCampaignName = null,
        private ?string $filterUrl = null,
        private ?string $filterStatus = null,
        private ?string $filterLastStatus = null,
        private ?string $filterExternalId = null,
        private ?string $filterStatistics = null,
        private ?bool $filterIsSocial = null,
        private ?bool $filterCoBranding = null,
        private ?bool $filterSelfPromotionOrganization = null,
        private ?bool $filterIsNative = null,
        private ?bool $filterIsSocialQuota = null,
        private ?int $page = null,
        private ?int $limit = null,
        private ?string $filterTrashed = null,
        private ?string $filterAccess = null,
        private ?string $sort = null,
        private ?string $include = null,
    )
    {
    }

    public function getHttpMethod(): HttpMethod
    {
        return HttpMethod::GET;
    }

    public function getEndpoint(): string
    {
        return 'creatives';
    }

    public function getPayload(): array
    {
        return array_filter([
            'filter[id]' => $this->filterId,
            'filter[id_exact]' => $this->filterIdExact,
            'filter[idNumber]' => $this->filterIdNumber,
            'filter[erid]' => $this->filterErid,
            'filter[search]' => $this->filterSearch,
            'filter[type]' => $this->filterType,
            'filter[contract-type]' => $this->filterContractType,
            'filter[campaign]' => $this->filterCampaign,
            'filter[contract]' => $this->filterContract,
            'filter[contract_id]' => $this->filterContractId,
            'filter[contract_id_exact]' => $this->filterContractIdExact,
            'filter[created_at]' => $this->filterCreatedAt,
            'filter[campaign_name]' => $this->filterCampaignName,
            'filter[url]' => $this->filterUrl,
            'filter[status]' => $this->filterStatus,
            'filter[last_status]' => $this->filterLastStatus,
            'filter[external_id]' => $this->filterExternalId,
            'filter[statistics]' => $this->filterStatistics,
            'filter[is_social]' => $this->filterIsSocial,
            'filter[co_branding]' => $this->filterCoBranding,
            'filter[self_promotion_organization]' => $this->filterSelfPromotionOrganization,
            'filter[is_native]' => $this->filterIsNative,
            'filter[is_social_quota]' => $this->filterIsSocialQuota,
            'page' => $this->page,
            'limit' => $this->limit,
            'filter[trashed]' => $this->filterTrashed,
            'filter[access]' => $this->filterAccess,
            'sort' => $this->sort,
            'include' => $this->include,
        ], static fn (mixed $value): bool => $value !== null);
    }

    public function getFiles(): array
    {
        return [];
    }
}
