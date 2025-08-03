<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class ItemBrand
 * 
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Item[] $items
 *
 * @package App\Models\Base
 */
class ItemBrand extends Model
{
	protected $table = 'item_brands';

	protected $fillable = [
		'name',
		'display_name'
	];

	public function items(): HasMany
	{
		return $this->hasMany(Item::class, 'brand_id');
	}
}
