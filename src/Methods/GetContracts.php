<?php

namespace Alexmal\OrdaApi\Methods;

use Alexmal\OrdaApi\Enums\HttpMethod;

final class GetContracts implements MethodInterface
{
    /**
     * @param int|null $filterId
     * @param int|null $filterIdExact Точный фильтр по ID
     * @param string|null $filterSearch
     * @param string|null $filterType
     * @param string|null $filterNumber
     * @param string|null $filterClient
     * @param string|null $filterDate
     * @param int|null $filterAmount
     * @param string|null $filterParentContract
     * @param int|null $filterParentContractId
     * @param bool|null $filterIsOriginalContract
     * @param bool|null $filterIsOrigin
     * @param string|null $filterStatus 1|6|7|8|2|3|4|10
     * @param string|null $filterLastStatus 1|2|3|4|6|7|8|10
     * @param string|null $filterExternalId
     * @param bool|null $filterRrOrderContracts
     * @param int|null $filterContractorId
     * @param string|null $filterContractorName Фильтр по наименованию
     * @param string|null $filterCreatedAt
     * @param int|null $page
     * @param int|null $limit
     * @param string|null $filterTrashed with|only
     * @param string|null $filterAccess with|only
     * @param string|null $sort number|-number|date|-date|type|-type|amount|-amount|id|-id
     * @param string|null $include erirEntity|childContractsCount|invoiceItemsCount|invoicesCount|creativesCount|status_explanations
     */
    public function __construct(
        private ?int $filterId = null,
        private ?int $filterIdExact = null,
        private ?string $filterSearch = null,
        private ?string $filterType = null,
        private ?string $filterNumber = null,
        private ?string $filterClient = null,
        private ?string $filterDate = null,
        private ?int $filterAmount = null,
        private ?string $filterParentContract = null,
        private ?int $filterParentContractId = null,
        private ?bool $filterIsOriginalContract = null,
        private ?bool $filterIsOrigin = null,
        private ?string $filterStatus = null,
        private ?string $filterLastStatus = null,
        private ?string $filterExternalId = null,
        private ?bool $filterRrOrderContracts = null,
        private ?int $filterContractorId = null,
        private ?string $filterContractorName = null,
        private ?string $filterCreatedAt = null,
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
        return 'contracts';
    }

    public function getPayload(): array
    {
        return array_filter([
            'filter[id]' => $this->filterId,
            'filter[id_exact]' => $this->filterIdExact,
            'filter[search]' => $this->filterSearch,
            'filter[type]' => $this->filterType,
            'filter[number]' => $this->filterNumber,
            'filter[client]' => $this->filterClient,
            'filter[date]' => $this->filterDate,
            'filter[amount]' => $this->filterAmount,
            'filter[parentContract]' => $this->filterParentContract,
            'filter[parent_contract_id]' => $this->filterParentContractId,
            'filter[is_original_contract]' => $this->filterIsOriginalContract,
            'filter[is_origin]' => $this->filterIsOrigin,
            'filter[status]' => $this->filterStatus,
            'filter[last_status]' => $this->filterLastStatus,
            'filter[external_id]' => $this->filterExternalId,
            'filter[rr_order_contracts]' => $this->filterRrOrderContracts,
            'filter[contractor_id]' => $this->filterContractorId,
            'filter[contractor_name]' => $this->filterContractorName,
            'filter[created_at]' => $this->filterCreatedAt,
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
