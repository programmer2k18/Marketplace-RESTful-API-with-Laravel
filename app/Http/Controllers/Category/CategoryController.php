<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;

use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;


class CategoryController extends Controller
{
    use ApiResponse;

    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->successResponse($this->category->getAllCategories());
    }


    /**
     * Store a newly resource.
     * @param  CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request) : JsonResponse
    {
        return $this->createdResponse( $this->category->addNewCategory($request->all()) );
    }

    /**
     * Display the specified resource.
     * @param  Category $category
     * @return JsonResponse
     */
    public function show(Category $category) : JsonResponse
    {
        return $this->successResponse($category) ;
    }

    /**
     * Update the specified resource.
     * @param  CategoryRequest $request
     * @param  Category $category
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, Category $category) : JsonResponse
    {
        $this->category->setCategory($category);
        if ($newCategory = $this->category->updateCategory($request->all()) )
            return $this->successResponse($newCategory);

        return $this->errorResponse('something went wrong, Couldn\'t update the category');
    }

    /**
     * Destroy the specified resource.
     * @param  Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category) :JsonResponse
    {
        if ($category->delete())
            return $this->successResponse('Category deleted successfully');
        return $this->errorResponse('something went wrong, Couldn\'t delete that category');
    }
}
