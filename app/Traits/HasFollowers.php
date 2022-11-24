<?php

namespace App\Traits;

use App\Models\User;

trait HasFollowers
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $user
     * @return bool
     */
    public function isFollowedBy(User $user): bool
    {
        if ($this->relationLoaded('followers')) {
            return $this->followers->contains($user);
        }

        return $this->followers()
            ->where('user_id', $user->getKey())
            ->exists();
    }

    /**
     * Return followers of this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function followers()
    {
        return $this->morphToMany(
            User::class,
            'followable',
            'followers'
        )->withPivot('created_at');
    }
}
