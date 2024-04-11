<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        try {
            $branches = $this->bookService->all();
            return successResponse($branches);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $branch = $this->bookService->find($request->id);
            return successResponse($branch);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 404);
        }
    }

    public function store(CreateBookRequest $request)
    {
        try {
            $branch = $this->bookService->create($request->validated());
            return successResponse($branch, 'Created', 201);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function update(UpdateBookRequest $request)
    {
        try {
            $branch = $this->bookService->update($request->validated());
            return successResponse($branch);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->bookService->delete($request->id);
            return successResponse(null, 'Deleted', 204);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $filters = $request->only(['title', 'author', 'isbn', 'genre', 'branch', 'perPage']); // Add more fields as needed

            $books = $this->bookService->search($filters);
            return response()->json($books);
        } catch (ModelNotFoundException $e) {
            return errorResponse('No books found matching the criteria.', 404);
        } catch (\Exception $e) {
            return errorResponse('An error occurred while searching for books.', 500);
        }
    }
}
