<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LandUnit extends Model
{
    use HasFactory;

    protected $fillable = ['land_property_id', 'land_usage_id', 'cadastral_nr', 'total_area(ha)', 'measurement_date'];

    // Relationship with land property
    public function landProperty(): BelongsTo
    {
        return $this->belongsTo(LandProperty::class);
    }

    // Relationship with land usage
    public function landUsage(): HasOne
    {
        return $this->hasOne(LandUsage::class);
    }
}
