<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Repositories\User\UserRepository;
use App\Traits\ApiResponse;
use App\User;
use Illuminate\Http\JsonResponse;


class UserController extends Controller
{
    use ApiResponse;

    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function index(): JsonResponse
    {
        return $this->successResponse($this->user->getAllUsers());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     */
    public function store(UserRequest $request): JsonResponse
    {
        return $this->createdResponse( $this->user->addNewUser($request->all()) );
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     */
    public function show(User $user) : JsonResponse
    {
        return $this->successResponse($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest  $request
     * @param  User $user
     */

    public function update(UserUpdateRequest $request, User $user) : JsonResponse
    {
        if ($request->has('admin')){
            if ( !$user->isVerified())
                return $this->errorResponse('Only verified users can update the admin field', 401);
        }
        $this->user->setUser($user);
        $this->user->updateUser( $request->all() );
        return $this->successResponse($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     */
    public function destroy(User $user) : JsonResponse
    {
        if ($user->delete())
            return $this->successResponse( 'User deleted successfully');
        return $this->errorResponse('something went wrong, Couldn\'t delete user');
    }
}
