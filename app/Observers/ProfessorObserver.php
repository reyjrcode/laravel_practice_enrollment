<?php

namespace App\Observers;

use App\Models\Professor;

class ProfessorObserver
{
    /**
     * Handle the Professor "created" event.
     */
    public function created(Professor $professor): void
    {
        //php artisan make:observer ProfessorObserver --model=Professor
        // $p = Professor::factory()->create()
        // $p -> members

        $professor->members()->attach([$professor->creator_id]);

    }

    /**
     * Handle the Professor "updated" event.
     */
    public function updated(Professor $professor): void
    {
        //
    }

    /**
     * Handle the Professor "deleted" event.
     */
    public function deleted(Professor $professor): void
    {
        //
    }

    /**
     * Handle the Professor "restored" event.
     */
    public function restored(Professor $professor): void
    {
        //
    }

    /**
     * Handle the Professor "force deleted" event.
     */
    public function forceDeleted(Professor $professor): void
    {
        //
    }
}
