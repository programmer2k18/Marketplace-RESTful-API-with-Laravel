<?php

namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository
{
    protected  $product;
    public function __construct(Product $product){
        $this->product = $product;
    }

    /**
     * @return bool
     */
    public function isAvailable():bool
    {
        return $this->getProduct()->status == $this->getProduct()::AVAILABLE_PRODUCT;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }
}
