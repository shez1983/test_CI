<?php

namespace App\Models;

use App\Traits\HasFollowers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory, HasFollowers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'has_volunteering_policy',
        'has_volunteer_insurance',
    ];

    /**
     * This organisation is a "Super Org" if it has sub organisations.
     *
     * @return bool
     */
    public function isSuper(): bool
    {
        return $this->subsidiaries->count();
    }

    /**
     * This organisation's parent organisation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * This organisation's sub organisations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subsidiaries()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(OrganisationType::class, 'organisation_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function volunteerCentre()
    {
        return $this->belongsTo(VolunteerCentre::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cvc()
    {
        return $this->belongsTo(Cvc::class);
    }
}
