<?php
namespace App\Providers;

use App\Models\Base;
use App\Policies\BasePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Base::class => BasePolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}