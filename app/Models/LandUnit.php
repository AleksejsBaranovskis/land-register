<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LandUnit extends Model
{
    use HasFactory;

    // Unit use types
    public const NO_TYPE = 0;
    public const AGRICULTURAL_LAND = 1;
    public const WOODLAND = 2;
    public const LAND_UNDER_WATER = 3;
    public const BUILT_UP_AREA = 4;

    protected $fillable = ['land_property_id', 'land_usage_id', 'cadastral_nr', 'total_area(ha)', 'measurement_date'];

    protected $table = 'land_units';

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

    // Land unit type transformation
    public static function landUnitUseTypes(): array
    {
        return [
            self::NO_TYPE => '-',
            self::AGRICULTURAL_LAND => 'agricultural land',
            self::WOODLAND => 'woodland',
            self::LAND_UNDER_WATER => 'land under water',
            self::BUILT_UP_AREA => 'built-up area'
        ];
    }

    // Show land unit type
    public function getLandUnitType(int $type): string
    {
        return self::landUnitUseTypes()[$type];
    }

    // Show cadastral number properly if it starts with 0
    public function getLandUnitZerofill(): string
    {
        return str_pad($this->attributes['cadastral_nr'], 11, '0', STR_PAD_LEFT);
    }
}
