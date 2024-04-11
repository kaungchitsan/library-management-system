<?php

namespace App\Repositories\Eloquent;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Repositories\Contracts\BookRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookRepository implements BookRepositoryInterface
{
    private $model;

    public function __construct(Book $model)
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
            throw new \Exception("Book not found");
        }
    }

    public function create(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw new \Exception("Error creating Book: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $book = $this->find($data['id']);
            $book->update($data);
            return $book;
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Book not found");
        } catch (\Exception $e) {
            throw new \Exception("Error updating Book: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $data = $this->find($id);
            $data->delete();
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Book not found");
        } catch (\Exception $e) {
            throw new \Exception("Error deleting Book: " . $e->getMessage());
        }
    }

    public function search($filters)
    {
        return BookResource::collection($this->model->filter($filters)->with('genre', 'branch')->orderBy('id', 'desc')->paginate($filters['perPage'] ?? 10));
    }

    public function decreaseAvailableQuantity(int $bookId)
    {
        $book = Book::findOrFail($bookId);
        $book->decrement('available_quantity');
    }

    public function increaseAvailableQuantity(int $bookId)
    {
        $book = Book::findOrFail($bookId);
        $book->increment('available_quantity');
    }
}