<?php

namespace App\Observers;

use App\Mail\Movement;
use App\Models\Revenue;
use Illuminate\Support\Facades\Mail;

class RevenueObserver
{

    public function sendMail($action)
    {
        if (auth()->user()->email == 'williamgalas2@gmail.com') {
            return;
        }

        Mail::to('williamgalas2@gmail.com')
            ->send(new Movement(auth()->user(), $action));
    }

    public function creating(Revenue $revenue)
    {
        $revenue['user_id'] = auth()->id();
    }

    public function created(Revenue $revenue)
    {
        activity()
            ->by(auth()->user())
            ->on($revenue)
            ->log('created!');

        $this->sendMail('created revenue - amount ' . $revenue->amount);
    }

    public function deleting(Revenue $revenue)
    {
        activity()
            ->by(auth()->user())
            ->on($revenue)
            ->log('deleted!');

        $this->sendMail('deleted revenue - amount ' . $revenue->amount);
    }

    public function restored(Revenue $revenue)
    {
        activity()
            ->by(auth()->user())
            ->on($revenue)
            ->log('restored!');

        $this->sendMail('restored revenue - amount ' . $revenue->amount);

    }

    public function updated(Revenue $revenue)
    {
        activity()
            ->by(auth()->user())
            ->on($revenue)
            ->log('updated!');

        $this->sendMail('updated revenue - amount ' . $revenue->amount);

    }
}
