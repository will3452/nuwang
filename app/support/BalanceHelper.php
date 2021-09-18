<?php

namespace App\Support;

use App\Models\Expense;
use App\Models\Revenue;
use App\Models\User;

class BalanceHelper
{
    const PERCENTAGE = 0.1;

    public function totalRevenue()
    {
        return Revenue::sum('amount');
    }

    public function totalExpenses()
    {
        return Expense::sum('amount');
    }

    public function __construct()
    {

    }

    public function getTotalIncome()
    {
        return ($this->totalRevenue() - $this->totalExpenses());
    }

    public function getPercentage()
    {
        return self::PERCENTAGE * $this->getTotalIncome();
    }

    public function getBalance()
    {
        $this->getTotalIncome() / User::count();
    }
}
