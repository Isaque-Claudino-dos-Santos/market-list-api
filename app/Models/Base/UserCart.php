<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Cart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserCart
 * 
 * @property int $id
 * @property int $cart_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cart $cart
 * @property User $user
 *
 * @package App\Models\Base
 */
class UserCart extends Model
{
	protected $table = 'user_carts';

	protected $casts = [
		'cart_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'cart_id',
		'user_id'
	];

	public function cart(): BelongsTo
	{
		return $this->belongsTo(Cart::class);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
