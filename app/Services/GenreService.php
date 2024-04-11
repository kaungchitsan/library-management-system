<?php

namespace App\Services;

use App\Repositories\Contracts\GenreRepositoryInterface;

class GenreService
{
    protected $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function all()
    {
        try {
            return $this->genreRepository->all();
        } catch (\Exception $e) {
            throw new \Exception("Error fetching genres: " . $e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            return $this->genreRepository->find($id);
        } catch (\Exception $e) {
            throw new \Exception("Error finding genre: " . $e->getMessage());
        }
    }

    public function create(array $data)
    {
        try {
            return $this->genreRepository->create($data);
        } catch (\Exception $e) {
            throw new \Exception("Error creating genre: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            return $this->genreRepository->update($data);
        } catch (\Exception $e) {
            throw new \Exception("Error updating genre: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->genreRepository->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("Error deleting genre: " . $e->getMessage());
        }
    }
}