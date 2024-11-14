<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomersAddress
 * 
 * @property int $customerNumber
 * @property int $address_id
 * 
 * @property Address $address
 * @property Customer $customer
 *
 * @package App\Models
 */
class CustomersAddress extends Model
{
	protected $table = 'customers_addresses';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'customerNumber' => 'int',
		'address_id' => 'int'
	];

	public function address()
	{
		return $this->belongsTo(Address::class);
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'customerNumber');
	}
}
