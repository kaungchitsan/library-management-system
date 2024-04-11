<?php

namespace App\Repositories\Contracts;

interface BorrowingRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function findById(int $id);

}
