<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Professor;
use App\Models\Subject;
use App\Policies\ProfessorPolicy;
use App\Policies\SubjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
            //
        Professor::class => ProfessorPolicy::class,
        Subject::class => SubjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}