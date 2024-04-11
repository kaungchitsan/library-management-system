<?php

namespace App\Http\Controllers;

use App\Services\BranchService;
use App\Http\Requests\BranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    protected $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    public function index()
    {
        try {
            $branches = $this->branchService->all();
            return successResponse($branches);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $branch = $this->branchService->find($request->id);
            return successResponse($branch);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 404);
        }
    }

    public function store(BranchRequest $request)
    {
        try {
            $branch = $this->branchService->create($request->validated());
            return successResponse($branch, 'Created', 201);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function update(UpdateBranchRequest $request)
    {
        try {
            $branch = $this->branchService->update($request->validated());
            return successResponse($branch);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->branchService->delete($request->id);
            return successResponse(null, 'Deleted', 204);
        } catch (\Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }
}
