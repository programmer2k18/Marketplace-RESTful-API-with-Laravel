<?php

namespace App\Repositories\User;

use App\Models\Seller;

class SellerRepository
{
    protected  $seller;
    public function __construct(Seller $seller){
        $this->seller = $seller;
    }

    public function getAllSellers()
    {
        return $this->getSeller()->has('products')->paginate(10);
    }

    /**
     * @return Seller
     */
    public function getSeller(): Seller
    {
        return $this->seller;
    }

    /**
     * @param Seller $seller
     */
    public function setSeller(Seller $seller): void
    {
        $this->seller = $seller;
    }
}
