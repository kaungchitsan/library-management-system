<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GenreService;
use App\Http\Requests\CreateGenreRequest;
use App\Http\Requests\UpdateGenreRequest;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        try {
            $data = $this->genreService->all();
            return successResponse($data);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $data = $this->genreService->find($request->id);
            return successResponse($data);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 404);
        }
    }

    public function store(CreateGenreRequest $request)
    {
        try {
            $data = $this->genreService->create($request->validated());
            return successResponse($data, 'Created', 201);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function update(UpdateGenreRequest $request)
    {
        try {
            $data = $this->genreService->update($request->validated());
            return successResponse($data);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->genreService->delete($request->id);
            return successResponse(null, 'Deleted', 204);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }
}
