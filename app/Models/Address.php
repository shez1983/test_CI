<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'city',
        'county',
        'postcode',
        'latitude',
        'longitude',
        'w3w',
    ];

    /**
     * Get the parent imageable model.
     */
    public function addressable()
    {
        return $this->morphTo();
    }
}
