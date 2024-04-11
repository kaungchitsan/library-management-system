<?php

namespace App\Repositories\Eloquent;

use App\Models\Genre;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Contracts\GenreRepositoryInterface;

class GenreRepository implements GenreRepositoryInterface
{
    private $model;

    public function __construct(Genre $model)
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
            throw new \Exception("Genre not found");
        }
    }

    public function create(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw new \Exception("Error creating genre: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $genre = $this->find($data['id']);
            $genre->update($data);
            return $genre;
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Genre not found");
        } catch (\Exception $e) {
            throw new \Exception("Error updating Genre: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = $this->find($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Genre not found");
        } catch (\Exception $e) {
            throw new \Exception("Error deleting Genre: " . $e->getMessage());
        }
    }
}