<?php

namespace App\Services;

use App\Http\Resources\BookResource;
use App\Repositories\Contracts\BookRepositoryInterface;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function all()
    {
        try {
            $books = $this->bookRepository->all();
            return BookResource::collection($books);
        } catch (\Exception $e) {
            throw new \Exception("Error fetching books: " . $e->getMessage());
        }
    }

    public function find($id)
    {
        try {
            return $this->bookRepository->find($id);
        } catch (\Exception $e) {
            throw new \Exception("Error finding book: " . $e->getMessage());
        }
    }

    public function create(array $data)
    {
        try {
            return $this->bookRepository->create($data);
        } catch (\Exception $e) {
            throw new \Exception("Error creating book: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            return $this->bookRepository->update($data);
        } catch (\Exception $e) {
            throw new \Exception("Error updating book: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            return $this->bookRepository->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("Error deleting book: " . $e->getMessage());
        }
    }

    public function search(array $filters)
    {
        return $this->bookRepository->search($filters);
    }
}