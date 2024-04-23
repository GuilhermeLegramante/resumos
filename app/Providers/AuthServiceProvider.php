<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Discipline;
use App\Models\Resume;
use App\Policies\ActivityPolicy;
use App\Policies\DisciplinePolicy;
use App\Policies\ResumePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Resume::class => ResumePolicy::class,
        Activity::class => ActivityPolicy::class,
        Discipline::class => DisciplinePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
