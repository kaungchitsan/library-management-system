<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use App\Models\FineRule;
use App\Models\LateReturn;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\BookRepositoryInterface;
use App\Repositories\Contracts\BorrowingRepositoryInterface;

class BorrowingService
{
    protected $borrowingRepository;
    protected $bookRepository;

    public function __construct(BorrowingRepositoryInterface $borrowingRepository, BookRepositoryInterface $bookRepository)
    {
        $this->borrowingRepository = $borrowingRepository;
        $this->bookRepository = $bookRepository;
    }

    public function getAllBorrowings()
    {
        return $this->borrowingRepository->all();
    }

    public function borrowBook(int $userId, int $bookId)
    {
        $book = $this->bookRepository->find($bookId);
        if (!$book) {
            throw new Exception('Book not found', 404);
        }
        
        if ($book->available_quantity <= 0) {
            throw new Exception('Book not available for borrowing', 400);
        }

        $borrowedFromDate = Carbon::now();
        $borrowedToDate = Carbon::now()->addDays(14);
        try {
            DB::beginTransaction();
            
            $this->borrowingRepository->create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'borrowed_by' => auth()->user()->id,
                'borrowed_from_date' => $borrowedFromDate,
                'borrowed_to_date' => $borrowedToDate,
            ]);
            
            $this->bookRepository->decreaseAvailableQuantity($bookId);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception('Failed to borrow book', 500);
        }
    }

    public function returnBook(int $borrowingId)
    {
        $borrowing = $this->borrowingRepository->findById($borrowingId);
        if (!$borrowing) {
            throw new Exception('Borrowing not found', 404);
        }

        $bookId = $borrowing->book_id;

        try {
            DB::beginTransaction();
            
            $borrowing->returned_at = Carbon::now();
            $borrowing->save();

            if ($borrowing->returned_at > $borrowing->borrowed_to_date) {

                $fineRule = FineRule::find(1);
                if ($fineRule) {
                    $fineAmount = $fineRule->fine_amount;
                } else {
                    $fineAmount = 0;
                }

                LateReturn::create([
                    'borrowing_id' => $borrowing->id,
                    'fine_rule_id' => $fineRule ? $fineRule->id : null,
                    'fine_amount' => $fineAmount,
                    'calculated_at' => Carbon::now(),
                ]);
            }
            
            $this->bookRepository->increaseAvailableQuantity($bookId);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception('Failed to return book', 500);
        }
    }

}