<?php

namespace App\Repositories\Eloquent;

use App\Models\Borrowing;
use App\Repositories\Contracts\BorrowingRepositoryInterface;

class BorrowingRepository implements BorrowingRepositoryInterface
{
    private $model;

    public function __construct(Borrowing $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }
}