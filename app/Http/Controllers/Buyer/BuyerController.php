<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Repositories\User\BuyerRepository;

use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;


class BuyerController extends Controller
{
    use ApiResponse;

    protected $buyer;

    public function __construct(BuyerRepository $buyer)
    {
        $this->buyer = $buyer;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->successResponse($this->buyer->getAllBuyers());
    }

    /**
     * Display the specified resource.
     *
     * @param Buyer $buyer
     * @return JsonResponse
     */
    public function show(Buyer $buyer): JsonResponse
    {
        return $this->successResponse($buyer);
    }
}
