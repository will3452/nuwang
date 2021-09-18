<?php

namespace App\Nova\Metrics;

use App\Models\Expense;
use App\Models\Revenue;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

class Balance extends Value
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        $revenues = Revenue::sum('amount');
        $expenses = Expense::sum('amount');

        return $this->result(($revenues - $expenses))
            ->format('0,0.00')
            ->allowZeroResult();
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'balance';
    }
}
