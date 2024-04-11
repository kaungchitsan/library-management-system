<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\Contracts\BranchRepositoryInterface::class,
            \App\Repositories\Eloquent\BranchRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\GenreRepositoryInterface::class,
            \App\Repositories\Eloquent\GenreRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\BookRepositoryInterface::class,
            \App\Repositories\Eloquent\BookRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\BorrowingRepositoryInterface::class,
            \App\Repositories\Eloquent\BorrowingRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
