<?php

declare(strict_types=1);

namespace App\Pagination;

/**
 * @template T
 */
readonly class PaginatedResult
{
    /**
     * @var T[]
     */
    public array $items;

    public int $totalItems;

    public int $itemsPerPage;

    public int $currentPage;

    public int $totalPages;

    public function __construct(array $items, int $totalItems, int $itemsPerPage, int $currentPage)
    {
        $this->items = $items;
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;
        $this->totalPages = (int) ceil($totalItems / $itemsPerPage);
    }
}
