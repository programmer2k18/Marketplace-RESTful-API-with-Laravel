<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Repositories\User\SellerRepository;

use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;


class SellerController extends Controller
{
    use ApiResponse;

    protected $seller;

    public function __construct(SellerRepository $seller)
    {
        $this->seller = $seller;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->successResponse($this->seller->getAllSellers());
    }

    /**
     * Display the specified resource.
     *
     * @param Seller $seller
     * @return JsonResponse
     */
    public function show(Seller $seller): JsonResponse
    {
        return $this->successResponse($seller);
    }

}
