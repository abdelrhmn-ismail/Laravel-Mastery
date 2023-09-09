<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends EloquentRepository
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    // Additional methods specific to the Book model, if needed.
}
