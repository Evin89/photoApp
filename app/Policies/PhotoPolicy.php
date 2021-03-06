<?php

namespace App\Policies;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Photo  $photo
     * @return mixed
     */
    public function view(User $user, Photo $photo)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

        // If user is admin or logged in
        return $user->is_admin || ( auth()->check());
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Photo  $photo
     * @return mixed
     */
    public function update(User $user, Photo $photo)
    {

        // If user is admin or logged in and the user_id of photo is same as user id
        return $user->is_admin || ( auth()->check() && $photo->user_id == auth()->id());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Photo  $photo
     * @return mixed
     */
    public function delete(User $user, Photo $photo)
    {
        // If user is admin or logged in and the user_id of photo is same as user id
        return $user->is_admin || ( auth()->check() &&$photo->user_id == auth()->id());
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Photo  $photo
     * @return mixed
     */
    public function restore(User $user, Photo $photo)
    {

        // If user is admin or logged in and the user_id of photo is same as user id
        return $user->is_admin || ( auth()->check() &&$photo->user_id == auth()->id());
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Photo  $photo
     * @return mixed
     */
    public function forceDelete(User $user, Photo $photo)
    {
        // If user is admin or logged in and the user_id of photo is same as user id
        return $user->is_admin || ( auth()->check() &&$photo->user_id == auth()->id());
    }
}
