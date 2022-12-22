<?php

namespace App\Policies;

use App\Models\MedicaleVisite;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicaleVisitePolicy
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
        return $user->admin;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MedicaleVisite $medicaleVisite)
    {
        return ($user->medical_assistant && $user->medical_assistant->medicale_visites->contains($medicaleVisite)) || $user->admin;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->medical_assistant;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MedicaleVisite $medicaleVisite)
    {
        return ($user->medical_assistant && $user->medical_assistant->medicale_visites->contains($medicaleVisite)) || $user->admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MedicaleVisite $medicaleVisite)
    {
        return ($user->medical_assistant && $user->medical_assistant->medicale_visites->contains($medicaleVisite)) || $user->admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MedicaleVisite $medicaleVisite)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MedicaleVisite  $medicaleVisite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MedicaleVisite $medicaleVisite)
    {
        //
    }
}
