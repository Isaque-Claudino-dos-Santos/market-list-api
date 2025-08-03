<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Cart;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CartPackage
 * 
 * @property int $id
 * @property int $cart_id
 * @property int $package_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cart $cart
 * @property Package $package
 *
 * @package App\Models\Base
 */
class CartPackage extends Model
{
	protected $table = 'cart_packages';

	protected $casts = [
		'cart_id' => 'int',
		'package_id' => 'int'
	];

	protected $fillable = [
		'cart_id',
		'package_id'
	];

	public function cart(): BelongsTo
	{
		return $this->belongsTo(Cart::class);
	}

	public function package(): BelongsTo
	{
		return $this->belongsTo(Package::class);
	}
}
