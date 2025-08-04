<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaginationResource;
use App\Http\UseCases\Items\GetItemUseCase;

class ItemController extends Controller
{
  public function __construct(
    private readonly GetItemUseCase $getItemUseCase
  ) {}

  public function getItems(): PaginationResource
  {
    return $this->getItemUseCase->getItemsPaginated();
  }
}
