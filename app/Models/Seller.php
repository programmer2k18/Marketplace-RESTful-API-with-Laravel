<?php

namespace App\Models;
use App\User;

class Seller extends User
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
