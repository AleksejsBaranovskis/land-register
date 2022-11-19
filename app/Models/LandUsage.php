<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LandUsage extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    // Relationship with land unit
    public function landUnit(): BelongsToMany
    {
        return $this->belongsToMany(LandUnit::class);
    }
}
