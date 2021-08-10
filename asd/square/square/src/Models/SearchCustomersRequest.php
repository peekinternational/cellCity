<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the request body of a request to the
 * `SearchCustomers` endpoint.
 */
class SearchCustomersRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var CustomerQuery|null
     */
    private $query;

    /**
     * Returns Cursor.
     *
     * Include the pagination cursor in subsequent calls to this endpoint to retrieve
     * the next set of results associated with the original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Include the pagination cursor in subsequent calls to this endpoint to retrieve
     * the next set of results associated with the original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Limit.
     *
     * A limit on the number of results to be returned in a single page.
     * The limit is advisory. The implementation might return more or fewer results.
     * If the supplied limit is negative, zero, or higher than the maximum limit
     * of 100, it is ignored.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * A limit on the number of results to be returned in a single page.
     * The limit is advisory. The implementation might return more or fewer results.
     * If the supplied limit is negative, zero, or higher than the maximum limit
     * of 100, it is ignored.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Query.
     *
     * Represents a query (including filtering criteria, sorting criteria, or both) used to search
     * for customer profiles.
     */
    public function getQuery(): ?CustomerQuery
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * Represents a query (including filtering criteria, sorting criteria, or both) used to search
     * for customer profiles.
     *
     * @maps query
     */
    public function setQuery(?CustomerQuery $query): void
    {
        $this->query = $query;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']  = $this->limit;
        }
        if (isset($this->query)) {
            $json['query']  = $this->query;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
