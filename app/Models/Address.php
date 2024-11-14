<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * 
 * @property int $id
 * @property string|null $addressLine1
 * @property string|null $addressLine2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postalCode
 * @property string|null $country
 * 
 * @property Collection|Customer[] $customers
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'addresses';
	public $timestamps = false;

	protected $fillable = [
		'addressLine1',
		'addressLine2',
		'city',
		'state',
		'postalCode',
		'country'
	];

	public function customers()
	{
		return $this->belongsToMany(Customer::class, 'customers_addresses', 'address_id', 'customerNumber');
	}
}
