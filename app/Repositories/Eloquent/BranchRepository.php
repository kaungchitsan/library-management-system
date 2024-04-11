<?php

namespace App\Repositories\Eloquent;

use App\Models\Branch;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Contracts\BranchRepositoryInterface;

class BranchRepository implements BranchRepositoryInterface
{
    private $model;

    public function __construct(Branch $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Branch not found");
        }
    }

    public function create(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw new \Exception("Error creating Branch: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $branch = $this->find($data['id']);
            $branch->update($data);
            return $branch;
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Branch not found");
        } catch (\Exception $e) {
            throw new \Exception("Error updating Branch: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = $this->find($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Branch not found");
        } catch (\Exception $e) {
            throw new \Exception("Error deleting Branch: " . $e->getMessage());
        }
    }
}