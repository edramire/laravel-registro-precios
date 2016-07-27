<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model {

	protected $table = 'cart_detail';
	public $timestamps = false;

	public function product()
	{
		return $this->belongsTo('Product');
	}

}