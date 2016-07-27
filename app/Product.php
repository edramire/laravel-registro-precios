<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = [
        'name', 'description', 'image_url'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function prices()
    {
        return $this->hasMany('App\ProductPrice');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function associate(Company $company, Category $category)
    {
        $this->category()->associate($category);
        $this->company()->associate($company);
    }
}
