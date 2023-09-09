<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends EloquentRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    // Additional methods specific to the Book model, if needed.
}
