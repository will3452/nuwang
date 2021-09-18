<?php

namespace App\Providers;

use App\Models\Expense;
use App\Models\Revenue;
use App\Observers\ExpenseObserver;
use App\Observers\RevenueObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Revenue::observe(RevenueObserver::class);
        Expense::observe(ExpenseObserver::class);
    }
}
