<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @mixin LengthAwarePaginator
 */
class PaginationResource extends JsonResource
{
    private ?string $dataResource = null;

    public function toArray(Request $_): array
    {
        $items = $this->items();
        $data = $this->dataResource !== null && !empty($items) ? $this->dataResource::make($items) : $items;

        return [
            'data' => $data,
            'current_pa ge' => $this->currentPage(),
            'last_page' => $this->lastPage()
        ];
    }

    public function using(string $dataResource): static
    {
        $this->dataResource = $dataResource;
        return $this;
    }
}
