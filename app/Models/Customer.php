<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $customerNumber
 * @property string $customerName
 * @property string $contactLastName
 * @property string $contactFirstName
 * @property string $phone
 * @property int|null $salesRepEmployeeNumber
 * @property float|null $creditLimit
 * 
 * @property Employee|null $employee
 * @property Collection|Category[] $categories
 * @property Collection|Address[] $addresses
 * @property Collection|Order[] $orders
 * @property Collection|Payment[] $payments
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';
	protected $primaryKey = 'customerNumber';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'customerNumber' => 'int',
		'salesRepEmployeeNumber' => 'int',
		'creditLimit' => 'float'
	];

	protected $fillable = [
		'customerName',
		'contactLastName',
		'contactFirstName',
		'phone',
		'salesRepEmployeeNumber',
		'creditLimit'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'salesRepEmployeeNumber');
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class, 'category_customer', 'customerNumber')
					->withTimestamps();
	}

	public function addresses()
	{
		return $this->belongsToMany(Address::class, 'customers_addresses', 'customerNumber');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'customerNumber');
	}

	public function payments()
	{
		return $this->hasMany(Payment::class, 'customerNumber');
	}
}
