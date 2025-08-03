<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Item;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PackageItem
 * 
 * @property int $id
 * @property int $item_id
 * @property int $package_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Item $item
 * @property Package $package
 *
 * @package App\Models\Base
 */
class PackageItem extends Model
{
	protected $table = 'package_items';

	protected $casts = [
		'item_id' => 'int',
		'package_id' => 'int'
	];

	protected $fillable = [
		'item_id',
		'package_id'
	];

	public function item(): BelongsTo
	{
		return $this->belongsTo(Item::class);
	}

	public function package(): BelongsTo
	{
		return $this->belongsTo(Package::class);
	}
}
