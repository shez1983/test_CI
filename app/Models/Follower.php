<?php

namespace App\Models;

use App\Events\Followed;
use App\Events\Unfollowed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>|bool
     */
    protected $fillable = [
        'user_id',
        'followable_type',
        'followable_id',
    ];

    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => Followed::class,
        'deleted' => Unfollowed::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function followable()
    {
        return $this->morphTo();
    }
}
