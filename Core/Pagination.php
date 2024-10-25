<?php
namespace Core;

class Pagination {
    private int $total;
    private int $perPage;
    private int $currentPage;
    private int $totalPages;

    public function __construct(int $total, int $perPage = 8, int $currentPage = 1) {
        $this->total = $total;
        $this->perPage = $perPage;
        $this->currentPage = $currentPage;
        $this->totalPages = ceil($total / $perPage);
    }

    public function getOffset(): int {
        return ($this->currentPage - 1) * $this->perPage;
    }

    public function getLimit(): int {
        return $this->perPage;
    }

    public function getTotalPages(): int {
        return $this->totalPages;
    }

    public function getCurrentPage(): int {
        return $this->currentPage;
    }

    public function hasNextPage(): bool {
        return $this->currentPage < $this->totalPages;
    }

    public function hasPreviousPage(): bool {
        return $this->currentPage > 1;
    }

    public function getNextPage(): int {
        return min($this->currentPage + 1, $this->totalPages);
    }

    public function getPreviousPage(): int {
        return max($this->currentPage - 1, 1);
    }

    public function getPageNumbers(): array {
        $pages = [];
        $start = max(1, $this->currentPage - 2);
        $end = min($this->totalPages, $this->currentPage + 2);

        if ($start > 1) {
            $pages[] = 1;
            if ($start > 2) {
                $pages[] = '...';
            }
        }

        for ($i = $start; $i <= $end; $i++) {
            $pages[] = $i;
        }

        if ($end < $this->totalPages) {
            if ($end < $this->totalPages - 1) {
                $pages[] = '...';
            }
            $pages[] = $this->totalPages;
        }

        return $pages;
    }
}