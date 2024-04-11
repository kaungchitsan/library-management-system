<?php

namespace App\Repositories\Contracts;

interface BookRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(array $data);

    public function delete($id);

    public function search($filters);

    public function decreaseAvailableQuantity(int $bookId);

    public function increaseAvailableQuantity(int $bookId);
}