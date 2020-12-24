<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function checkInput;

class Product extends Model
{
    use SoftDeletes;

    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $fillable = ['name', 'description', 'status', 'quantity', 'seller_id','image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_categories',
                                   'product_id', 'category_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = checkInput($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = checkInput($value);
    }
}
