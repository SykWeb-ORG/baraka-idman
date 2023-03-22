<?php

namespace App\Policies;

use App\Models\JuridiqueVisite;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JuridiqueVisitePolicy
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
        return $user->juridique_assistant || $user->admin;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, JuridiqueVisite $juridiqueVisite)
    {
        return ($user->juridique_assistant && $user->juridique_assistant->juridique_visites->contains($juridiqueVisite)) || $user->admin;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->juridique_assistant;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, JuridiqueVisite $juridiqueVisite)
    {
        return ($user->juridique_assistant && $user->juridique_assistant->juridique_visites->contains($juridiqueVisite)) || $user->admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, JuridiqueVisite $juridiqueVisite)
    {
        return ($user->juridique_assistant && $user->juridique_assistant->juridique_visites->contains($juridiqueVisite)) || $user->admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, JuridiqueVisite $juridiqueVisite)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JuridiqueVisite  $juridiqueVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, JuridiqueVisite $juridiqueVisite)
    {
        //
    }
}
