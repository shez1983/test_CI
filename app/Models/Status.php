<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const PENDING = 'pending';

    const REJECTED = 'rejected';

    const APPROVED = 'approved';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->name === self::APPROVED;
    }

    /**
     * @return bool
     */
    public function isRejected(): bool
    {
        return $this->name === self::REJECTED;
    }

    /**
     * @return bool
     */
    public function isPending(): bool
    {
        return $this->name === self::PENDING;
    }
}
