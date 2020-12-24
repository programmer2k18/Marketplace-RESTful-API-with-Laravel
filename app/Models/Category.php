<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function trim;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories',
            'category_id', 'product_id');
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
