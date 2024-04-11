<?php

namespace App\Services;

use App\Repositories\Contracts\BranchRepositoryInterface;

class BranchService
{
    protected $branchRepository;

    public function __construct(BranchRepositoryInterface $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function all()
    {
        try {
            return $this->branchRepository->all();
        } catch (\Exception $e) {
            throw new \Exception("Error fetching branches: " . $e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            return $this->branchRepository->find($id);
        } catch (\Exception $e) {
            throw new \Exception("Error finding branch: " . $e->getMessage());
        }
    }

    public function create(array $data)
    {
        try {
            return $this->branchRepository->create($data);
        } catch (\Exception $e) {
            throw new \Exception("Error creating branch: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            return $this->branchRepository->update($data);
        } catch (\Exception $e) {
            throw new \Exception("Error updating branch: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->branchRepository->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("Error deleting branch: " . $e->getMessage());
        }
    }
}