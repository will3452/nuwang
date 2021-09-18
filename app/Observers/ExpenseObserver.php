<?php

namespace App\Observers;

use App\Mail\Movement;
use App\Models\Expense;
use Illuminate\Support\Facades\Mail;

class ExpenseObserver
{

    public function sendMail($action)
    {
        if (auth()->user()->email == 'williamgalas2@gmail.com') {
            return;
        }

        Mail::to('williamgalas2@gmail.com')
            ->send(new Movement(auth()->user(), $action));
    }

    public function creating(Expense $expense)
    {
        $expense['type'] = 'expense';
        $expense['user_id'] = auth()->id();

    }

    public function created(Expense $expense)
    {
        activity()
            ->by(auth()->user())
            ->on($expense)
            ->log('created!');

        $this->sendMail('created expense - amount ' . $expense->amount);

    }

    public function deleting(Expense $expense)
    {
        activity()
            ->by(auth()->user())
            ->on($expense)
            ->log('deleted!');

        $this->sendMail('deleted expense - amount ' . $expense->amount);

    }

    public function restored(Expense $expense)
    {
        activity()
            ->by(auth()->user())
            ->on($expense)
            ->log('restored!');

        $this->sendMail('restored expense - amount ' . $expense->amount);

    }

    public function updated(Expense $expense)
    {
        activity()
            ->by(auth()->user())
            ->on($expense)
            ->log('updated!');

        $this->sendMail('updated expense - amount ' . $expense->amount);

    }
}
