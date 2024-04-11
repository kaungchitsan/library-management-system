<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\BorrowingService;
use App\Http\Requests\BorrowingRequest;
use App\Http\Resources\BorrowingResource;

class BorrowingController extends Controller
{
    protected $borrowingService;

    public function __construct(BorrowingService $borrowingService)
    {
        $this->borrowingService = $borrowingService;
    }

    public function index()
    {
        try {
            $borrowings = $this->borrowingService->getAllBorrowings();
            return BorrowingResource::collection($borrowings);
        } catch (Exception $e) {
            return errorResponse($e->getMessage(), 500);
        }
    }

    public function borrow(BorrowingRequest $request)
    {
        try {
            $userId = $request->input('user_id');
            $bookId = $request->input('book_id');
            
            $this->borrowingService->borrowBook($userId, $bookId);
            
            return successResponse();
        } catch (Exception $e) {
            return errorResponse($e->getMessage());
        }
    }

    public function return(Request $request)
    {
        try {
            $borrowingId = $request->input('borrowing_id');
            
            $this->borrowingService->returnBook($borrowingId);
            
            return successResponse();
        } catch (Exception $e) {
            return errorResponse($e->getMessage());
        }
    }
}
