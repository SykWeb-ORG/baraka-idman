<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('roles-permissions-ability', function (User $user) {
            return $this->checkAbilityByAction($user, 'gérer les roles et les permission');
        });
        Gate::define('archive-beneficiaire-ability', function (User $user) {
            return $this->checkAbilityByAction($user, 'archiver un beneficiaire');
        });
        Gate::define('desuarchive-beneficiaire-ability', function (User $user) {
            return $this->checkAbilityByAction($user, 'disarchiver un beneficiaire');
        });
        Gate::define('show-history-beneficiaire-ability', function (User $user) {
            return $this->checkAbilityByAction($user, 'Afficher l\'historique des beneficiaires');
        });
        Gate::define('beneficiaire-ateliers-ability', function (User $user) {
            return $this->checkAbilityByAction($user, 'Attacher beneficiaire avec les ateliers');
        });
        Gate::define('beneficiaire-cas-ability', function (User $user) {
            return $this->checkAbilityByAction($user, 'Attacher beneficiaire avec les cas juridiques');
        });
        Gate::define('roles-services-ability', function (User $user) {
            return $this->checkAbilityByAction($user, 'gérer les roles et les services');
        });
        Gate::define('intervenant-zones-ability', function (User $user) {
            return $this->checkAbilityByAction($user, 'Attacher intervenant avec les zones');
        });
    }

    /**
     * 
     * @param App\Models\User $user the current user
     * @param string $action the name of the action to check
     * @return bool whether if the current user can do the specified action
     */
    private function checkAbilityByAction(User $user, $action)
    {
        if ($user->admin) {
            $role = 'admin';
        } elseif ($user->medical_assistant) {
            $role = 'medical assistant';
        } elseif ($user->social_assistant) {
            $role = 'social assistant';
        } elseif ($user->intervenant) {
            $role = 'intervenant';
        }
        $his_permissions = Role::where('role_nom', $role)
                            ->first()
                            ->permissions
                            ->map(function ($action, $key) {
                                return $action['action_nom'];
                            });
        $he_can = $his_permissions->contains($action);
        return $he_can;
    }
}
