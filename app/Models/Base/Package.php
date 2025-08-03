<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Cart;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Package
 * 
 * @property int $id
 * @property string $name
 * @property int $quantity
 * @property int $quantity_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Cart[] $carts
 * @property Collection|Item[] $items
 *
 * @package App\Models\Base
 */
class Package extends Model
{
	protected $table = 'packages';

	protected $casts = [
		'quantity' => 'int',
		'quantity_type' => 'int'
	];

	protected $fillable = [
		'name',
		'quantity',
		'quantity_type'
	];

	public function carts(): BelongsToMany
	{
		return $this->belongsToMany(Cart::class, 'cart_packages')
					->withPivot('id')
					->withTimestamps();
	}

	public function items(): BelongsToMany
	{
		return $this->belongsToMany(Item::class, 'package_items')
					->withPivot('id')
					->withTimestamps();
	}
}
