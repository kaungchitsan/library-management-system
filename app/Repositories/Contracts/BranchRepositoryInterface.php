<?php

namespace App\Repositories\Contracts;

interface BranchRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(array $data);

    public function delete($id);
}