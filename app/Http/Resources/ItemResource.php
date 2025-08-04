<?php

namespace App\Http\Resources;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Item
 */
class ItemResource extends JsonResource
{
    public function toArray(Request $_): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'brand' => $this->whenLoaded($this->brand_id, 'display_name'),
            'description' => $this->description,
            'created_at' => $this->created_at
        ];
    }
}
