<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;
use function response;

class ProductController extends Controller
{
    protected $product;

    /**
     * ProductController constructor.
     * @param ProductRepository $product
     */
    public function __construct(ProductRepository $product){
        $this->product = $product;
    }

    public function index()
    {
        return response()->json( $this->product->getProduct()::all() );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
