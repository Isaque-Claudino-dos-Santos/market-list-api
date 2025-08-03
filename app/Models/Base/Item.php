<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ItemBrand;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Item
 * 
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property string|null $description
 * @property int $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ItemBrand $item_brand
 * @property Collection|Package[] $packages
 *
 * @package App\Models\Base
 */
class Item extends Model
{
	protected $table = 'items';

	protected $casts = [
		'brand_id' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'brand_id',
		'name',
		'description',
		'price'
	];

	public function item_brand(): BelongsTo
	{
		return $this->belongsTo(ItemBrand::class, 'brand_id');
	}

	public function packages(): BelongsToMany
	{
		return $this->belongsToMany(Package::class, 'package_items')
					->withPivot('id')
					->withTimestamps();
	}
}
