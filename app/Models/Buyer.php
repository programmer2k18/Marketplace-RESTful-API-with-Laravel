<?php

namespace App\Models;

use App\User;
use function checkInput;

class Buyer extends User
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
