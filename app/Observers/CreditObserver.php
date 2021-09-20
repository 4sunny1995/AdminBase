<?php

namespace App\Observers;

use App\Models\Credit;

class CreditObserver
{
    /**
     * Handle the Credit "created" event.
     *
     * @param  \App\Models\Credit  $credit
     * @return void
     */
    public function created(Credit $credit)
    {
        $credit->customer->credit += $credit->amount;
        $credit->customer->credit < 0 && $credit->customer->credit = 0;
        $credit->customer->save();
    }

    /**
     * Handle the Credit "updated" event.
     *
     * @param  \App\Models\Credit  $credit
     * @return void
     */
    public function updated(Credit $credit)
    {
        //
    }

    /**
     * Handle the Credit "deleted" event.
     *
     * @param  \App\Models\Credit  $credit
     * @return void
     */
    public function deleted(Credit $credit)
    {
        //
    }

    /**
     * Handle the Credit "restored" event.
     *
     * @param  \App\Models\Credit  $credit
     * @return void
     */
    public function restored(Credit $credit)
    {
        //
    }

    /**
     * Handle the Credit "force deleted" event.
     *
     * @param  \App\Models\Credit  $credit
     * @return void
     */
    public function forceDeleted(Credit $credit)
    {
        //
    }
}
