<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryCustomer
 * 
 * @property int $customerNumber
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Customer $customer
 * @property Category $category
 *
 * @package App\Models
 */
class CategoryCustomer extends Model
{
	protected $table = 'category_customer';
	public $incrementing = false;

	protected $casts = [
		'customerNumber' => 'int',
		'category_id' => 'int'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'customerNumber');
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	
}
