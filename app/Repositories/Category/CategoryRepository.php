<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAllCategories(){
        return $this->getCategory()->all();
    }

    public function addNewCategory( array $data) : Category
    {
        return $this->getCategory()->create($data);
    }

    public function updateCategory( array $data): bool
    {
        return $this->getCategory()->update($data);
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

}
