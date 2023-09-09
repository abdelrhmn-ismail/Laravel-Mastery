<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class EloquentRepository implements RepositoryInterface
{

    public function __construct(protected Model $model)
    {
    }

    public function getAll()
    {
        return $this->model::all();
    }

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = $this->find($id);
        $model->delete();
    }
}
