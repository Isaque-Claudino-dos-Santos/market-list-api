<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Cart
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Package[] $packages
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Cart extends Model
{
	protected $table = 'carts';

	protected $fillable = [
		'name'
	];

	public function packages(): BelongsToMany
	{
		return $this->belongsToMany(Package::class, 'cart_packages')
					->withPivot('id')
					->withTimestamps();
	}

	public function users(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'user_carts')
					->withPivot('id')
					->withTimestamps();
	}
}
