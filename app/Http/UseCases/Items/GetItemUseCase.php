<?php

namespace App\Http\UseCases\Items;

use App\Http\Resources\ItemResource;
use App\Http\Resources\PaginationResource;
use App\Models\Item;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Container\Attributes\Singleton;

#[Singleton]
class GetItemUseCase
{
  public function  getItemsPaginated(): PaginationResource
  {
    $data =  QueryBuilder::for(Item::class)
      ->paginate();

    return PaginationResource::make($data)->using(ItemResource::class);
  }
}
