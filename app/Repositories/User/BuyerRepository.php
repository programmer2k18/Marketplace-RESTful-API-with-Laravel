<?php

namespace App\Repositories\User;

use App\Models\Buyer;

class BuyerRepository
{
    protected  $buyer;

    public function __construct(Buyer $buyer){
        $this->buyer = $buyer;
    }

    public function getAllBuyers(){
        return $this->getBuyer()->has('transactions')->paginate(10);
    }

    /**
     * @return Buyer
     */
    public function getBuyer(): Buyer
    {
        return $this->buyer;
    }

    /**
     * @param Buyer $buyer
     */
    public function setBuyer(Buyer $buyer): void
    {
        $this->buyer = $buyer;
    }
}
