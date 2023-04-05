<?php

namespace App\Policies;

use App\Models\Projet;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $this->checkAbilityByAction($user, 'afficher projet');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Projet $projet)
    {
        $this->viewAny($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $this->checkAbilityByAction($user, 'ajouter projet');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Projet $projet)
    {
        return $this->checkAbilityByAction($user, 'modifier projet');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Projet $projet)
    {
        return $this->checkAbilityByAction($user, 'supprimer projet');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Projet $projet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Projet $projet)
    {
        //
    }

    /**
     * 
     * @param App\Models\User $user the current user
     * @param string $action the name of the action to check
     * @return bool whether if the current user can do the specified action
     */
    function checkAbilityByAction(User $user, $action)
    {
        if ($user->admin) {
            $role = 'admin';
        } elseif ($user->medical_assistant) {
            $role = 'medical assistant';
        } elseif ($user->juridique_assistant) {
            $role = 'juridique assistant';
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
